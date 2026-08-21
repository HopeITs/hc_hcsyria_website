/*!
 * Admin micro-projects table search.
 *
 * Column layout, identical in the per-city, pending and canceled tables:
 *   0 = NO  -> projects.id              internal key, hidden, NOT searchable
 *   1 = ID  -> projects.MicroProject_ID the project number admins actually search by
 *   2 = Published                       hidden
 *
 * Search behaviour: when the term matches at least one project number, only those
 * rows are kept, so typing 1234 stops returning rows whose mobile happens to
 * contain 1234. When no project number matches, every column is searched as
 * before, so a full mobile number still finds its project.
 *
 * Matches are highlighted in the visible cells after every draw.
 */
(function ($) {
    'use strict';

    var ID_COLUMN = 1;

    // tableId -> lowercase project numbers, captured once at init
    var idValues = {};
    // tableId -> {term: string, hasIdMatch: bool}, so the scan runs once per term
    var matchCache = {};

    function escapeRegExp(value) {
        return value.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }

    function hasIdMatch(tableId, term) {
        var cached = matchCache[tableId];
        if (cached && cached.term === term) {
            return cached.hasIdMatch;
        }

        var values = idValues[tableId] || [];
        var found = false;
        for (var i = 0; i < values.length; i++) {
            if (values[i].indexOf(term) !== -1) {
                found = true;
                break;
            }
        }

        matchCache[tableId] = {term: term, hasIdMatch: found};
        return found;
    }

    $.fn.dataTable.ext.search.push(function (settings, rowData) {
        var tableId = settings.nTable.id;

        // Only tables registered through initProjectTable take part.
        if (!Object.prototype.hasOwnProperty.call(idValues, tableId)) {
            return true;
        }

        var term = (settings.oPreviousSearch.sSearch || '').trim().toLowerCase();
        if (term === '') {
            return true;
        }

        // No project number matches this term, so fall back to normal filtering.
        if (!hasIdMatch(tableId, term)) {
            return true;
        }

        return String(rowData[ID_COLUMN]).toLowerCase().indexOf(term) !== -1;
    });

    function highlight(tableNode, term) {
        var cells = tableNode.querySelectorAll('tbody > tr > td, tbody > tr > th');
        var needle = term.toLowerCase();

        Array.prototype.forEach.call(cells, function (cell) {
            // Undo the previous highlight before looking at this cell again.
            if (cell.dataset.searchHlText !== undefined) {
                cell.textContent = cell.dataset.searchHlText;
                delete cell.dataset.searchHlText;
            }

            // Action, map and video cells hold buttons and links, leave them alone.
            if (cell.children.length || needle === '') {
                return;
            }

            var text = cell.textContent;
            if (text.toLowerCase().indexOf(needle) === -1) {
                return;
            }

            cell.dataset.searchHlText = text;
            cell.textContent = '';

            var pattern = new RegExp(escapeRegExp(term), 'gi');
            var last = 0;
            var match;

            while ((match = pattern.exec(text)) !== null) {
                if (match.index > last) {
                    cell.appendChild(document.createTextNode(text.slice(last, match.index)));
                }

                var mark = document.createElement('mark');
                mark.className = 'search-highlight';
                mark.textContent = match[0];
                cell.appendChild(mark);

                last = match.index + match[0].length;

                if (match[0].length === 0) {
                    pattern.lastIndex++;
                }
            }

            if (last < text.length) {
                cell.appendChild(document.createTextNode(text.slice(last)));
            }
        });
    }

    window.initProjectTable = function (selector) {
        var api = $(selector).DataTable({
            dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",
            buttons: ['excel', 'pdf', 'colvis'],
            columnDefs: [
                {targets: [0, 2], visible: false},
                {targets: 0, searchable: false}
            ],
            drawCallback: function (settings) {
                var table = new $.fn.dataTable.Api(settings);
                highlight(settings.nTable, (table.search() || '').trim());
            }
        });

        var tableId = api.table().node().id;

        idValues[tableId] = api
            .column(ID_COLUMN, {search: 'none', order: 'index', page: 'all'})
            .data()
            .toArray()
            .map(function (value) {
                return String(value).trim().toLowerCase();
            });

        delete matchCache[tableId];

        return api;
    };
})(jQuery);
