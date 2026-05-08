<div>
    @props([
    'placeholder' => 'Add tag',
    'suggestions' => [],
    'forceSuggestion' => false,
    'name' => 'tags'
])

    @php
        $suggestionsString = is_array($suggestions) ? implode(',', $suggestions) : $suggestions;
        $suggestionsArray = explode(',', $suggestionsString);

        $normalized = collect($suggestionsArray)
            ->filter()
            ->map(function ($value, $key) {
                return is_string($key)
                    ? ['key' => (string)$key, 'label' => (string)$value]
                    : ['key' => (string)$value, 'label' => (string)$value];
            })->values();
    @endphp

    <div
        x-data="tagsInput({
        model: @entangle('value'),
        suggestions: @js($normalized),
        forceSuggestion: {{ $forceSuggestion ? 'true' : 'false' }},})"
        class="position-relative w-100"
        wire:ignore>
        <input type="hidden" name="{{ $name }}" :value="model">

        <div
            class="form-control d-flex flex-wrap align-items-center gap-2 p-2"
            :class="{'focused-ring': focused}"
            style="min-height: 45px; height: auto; cursor: text; transition: border-color 0.2s, box-shadow 0.2s;"
            @click="$refs.input.focus(); showAllSuggestions()">
            <template x-for="(tag, i) in tags" :key="i">
            <span
                class="badge d-inline-flex align-items-center gap-1 py-2 px-2 shadow-sm animate__animated animate__fadeIn animate__faster"
                style="background-color: #C92228; color: white; border-radius: 4px; font-weight: 500;">
                <span x-text="displayLabel(tag)"></span>
                <button
                    type="button"
                    @click.stop="remove(i)"
                    class="btn-close btn-close-white"
                    style="font-size: 0.5rem; box-shadow: none;">
                </button>
            </span>
            </template>

            <input
                x-ref="input"
                type="text"
                class="border-0 flex-grow-1 p-0 m-0"
                style="outline: none; box-shadow: none; min-width: 120px; background: transparent !important; color: #000000 !important; caret-color: #000000 !important; color-scheme: light !important; -webkit-text-fill-color: #000000 !important;"
                :placeholder="tags.length === 0 ? '{{ $placeholder }}' : ''"
                @focus="focused = true; showAllSuggestions()"
                @click="showAllSuggestions()"
                @blur="focused = false; addFromInput(); hideSuggestionsLater()"
                @input="filterSuggestions($event.target.value)"
                @keydown.enter.prevent="addFromInput()"
                @keydown.tab.prevent="addFromInput()"
                @keydown.backspace="maybeRemove()"
                @paste.prevent="paste($event)">
        </div>

        <template x-if="showSuggestions && filtered.length">
            <ul
                class="position-absolute start-0 w-100 bg-white border border-secondary-subtle rounded shadow-lg mt-1 p-0"
                style="z-index: 9999; max-height: 250px; overflow-y: auto; list-style: none;">
                <li class="px-3 py-2 small text-muted bg-light border-bottom sticky-top">Suggestions</li>
                <template x-for="(s, i) in filtered" :key="i">
                    <li
                        @mousedown.prevent="selectSuggestion(s)"
                        class="px-3 py-2 cursor-pointer suggestion-item border-bottom last:border-0 bg-white"
                        style="list-style: none;"
                        x-text="s.label"
                    ></li>
                </template>
            </ul>
        </template>
    </div>

    <style>
        .form-control.d-flex {
            background-color: #ffffff !important;
            border: 1px solid #ced4da !important;
        }

        .form-control.d-flex {
            color-scheme: light !important;
        }

        .form-control.d-flex input {
            color: #000000 !important;
            caret-color: #000000 !important;
            -webkit-text-fill-color: #000000 !important;
        }

        .badge {
            color: #ffffff !important;
            -webkit-text-fill-color: #ffffff !important;
        }

        .badge .btn-close {
            filter: invert(1) grayscale(100%) brightness(200%);
        }

        .suggestion-item {
            transition: background 0.15s ease-in-out;
            color: #333;
        }
        .suggestion-item:hover {
            background-color: #f1f3f5 !important;
            color: #C92228 !important;
        }
        ul::-webkit-scrollbar {
            width: 6px;
        }
        ul::-webkit-scrollbar-thumb {
            background: #ced4da;
            border-radius: 10px;
        }
    </style>

    @once
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('tagsInput', ({ model, suggestions = [], forceSuggestion = false }) => ({
                    model,
                    tags: [],
                    suggestions,
                    filtered: [],
                    showSuggestions: false,
                    forceSuggestion,
                    focused: false,

                    init() {
                        this.syncFromModel();
                        this.$watch('model', () => this.syncFromModel());
                        this.$watch('tags', () => this.syncToModel());
                    },

                    showAllSuggestions() {
                        const currentTagsLower = this.tags.map(t => t.toLowerCase());
                        this.filtered = this.suggestions
                            .filter(s => !currentTagsLower.includes(s.label.toLowerCase()));

                        // .slice(0, 10) REMOVED so all tags show
                        this.showSuggestions = this.filtered.length > 0;
                    },

                    syncFromModel() {
                        if (typeof this.model === 'string' && this.model.length > 0) {
                            this.tags = this.model.split(',').map(t => t.trim());
                        } else {
                            this.tags = [];
                        }
                    },

                    syncToModel() {
                        this.model = this.tags.join(',');
                    },

                    add(tag) {
                        tag = String(tag || '').trim();
                        if (!tag) return;

                        const lowerTag = tag.toLowerCase();
                        const match = this.suggestions.find(s =>
                            s.key.toLowerCase() === lowerTag || s.label.toLowerCase() === lowerTag
                        );

                        const valueToPush = match ? match.label : tag;

                        if (this.forceSuggestion && !match) {
                            this.$refs.input.value = '';
                            this.hideSuggestions();
                            return;
                        }

                        if (!this.tags.map(t => t.toLowerCase()).includes(valueToPush.toLowerCase())) {
                            this.tags.push(valueToPush);
                        }

                        this.$refs.input.value = '';
                        this.showAllSuggestions(); // Refresh list
                        this.hideSuggestions();
                    },

                    addFromInput() {
                        this.add(this.$refs.input.value);
                    },

                    remove(i) {
                        this.tags.splice(i, 1);
                    },

                    maybeRemove() {
                        if (this.$refs.input.value === '' && this.tags.length) {
                            this.remove(this.tags.length - 1);
                        }
                    },

                    filterSuggestions(value) {
                        const v = value.trim().toLowerCase();
                        if (!v) {
                            this.showAllSuggestions();
                            return;
                        }

                        this.filtered = this.suggestions
                            .filter(s =>
                                s.label.toLowerCase().includes(v) &&
                                !this.tags.map(t => t.toLowerCase()).includes(s.label.toLowerCase())
                            );

                        this.showSuggestions = this.filtered.length > 0;
                    },

                    selectSuggestion(s) {
                        this.add(s.label);
                    },

                    hideSuggestions() { this.showSuggestions = false; },
                    hideSuggestionsLater() { setTimeout(() => this.hideSuggestions(), 150); },

                    displayLabel(key) {
                        const match = this.suggestions.find(s => s.key.toLowerCase() === key.toLowerCase());
                        return match ? match.label : key;
                    }
                }))
            })
        </script>
    @endonce

</div>
