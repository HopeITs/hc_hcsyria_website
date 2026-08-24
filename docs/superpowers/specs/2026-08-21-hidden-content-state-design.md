# Hidden content state — design

**Date:** 2026-08-21
**Scope:** micro projects, initiatives (all five programs), news

## Problem

Anything offline was implicitly "pending to publish". There was no way to park
content that is finished with but should not sit in the publish queue forever —
42 news items and 4 initiatives were cluttering the dashboard that way.

## Model

A `hidden` flag pairs with the existing state column. Hidden content is still
offline, which is why no public query needed to change.

| `online` / `MPE_Published` | `hidden` | Meaning |
|---|---|---|
| 1 (or 1,2 for projects) | 0 | Published — live on the site |
| 0 | 0 | Pending to publish |
| 0 | 1 | Hidden |

`online=1, hidden=1` is unreachable: publishing always clears `hidden`.

### Why a flag and not a third value in `online`

`PublicController` never selects `online = 0` — the public site only ever asks
for `online = 1`. A separate flag therefore leaves all 139 public queries
correct without touching them. Widening `online` to a third value would have
required auditing all 153 usages, where a single missed `online != 0` would
silently publish hidden content.

## Components

**Schema** — `2026_08_21_000001_add_hidden_to_content_tables` adds
`hidden TINYINT(1) NOT NULL DEFAULT 0` to `projects`, `initiatives`, `news`,
each with a composite index on `(state column, hidden)`.
`2026_08_21_000002_set_initial_hidden_content` marks the 37 news and 3
initiative IDs supplied by the content team, guarded by `online = 0` so a
re-run can never pull a published item off the site.

**Scopes** — `scopePending()` and `scopeHiddenOnly()` on `Project`,
`Initiative` and `News`. They hide the fact that projects use `MPE_Published`
while the others use `online`, so `Project::pending()` and `News::pending()`
mean the same thing at every call site. Named `scopeHiddenOnly` rather than
`scopeHidden` to stay clear of Eloquent's `$hidden` serialization property.

**Query sites** — every admin list that selects offline rows now calls
`pending()`: `HomeController@home` (32 replacements across its publish /
English-check and admin / place-scoped branches), the five program
controllers, `InitiativesController`, `NewsController`, and both
`projectsController@index` and `@indexjson`.

**Transitions** — `hide()` sets offline and `hidden = 1` in one save, so
hiding a published item takes it down. `unhide()` clears the flag and leaves
it offline, returning it to pending. All eight publish actions clear `hidden`.

**UI** — a Hidden tab and Hide/Unhide buttons on eight admin indexes. Buttons
are gated by whoever can already publish that content type: Admin or English
Editor for news and initiatives, Admin or Publisher for projects.

## Out of scope

Successes and Roots of Hope keep the old two-state behaviour; their 13 offline
selectors are deliberately untouched. On the DISC and Study Zone indexes the
Hidden tab therefore lists initiatives only, and the pending-successes
sections are unchanged.

## Verification

20 assertions covering scope counts, that pending lists exclude hidden, that
publishing a hidden item clears the flag and does not land it in pending, and
that hiding a published item removes it from the public query — the last two
run inside a rolled-back transaction. All public routes re-checked afterwards.
