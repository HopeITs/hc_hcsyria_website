/*!
 * Hide / Unhide without a page reload.
 *
 * The admin indexes are expensive to render - the news index rebuilds six
 * DataTables, the study index runs the whole statistics block - so a normal
 * form POST plus redirect made every Hide feel slow. This posts in the
 * background and moves the row between the Pending and Hidden tables live.
 *
 * Forms opt in with class="js-hidden-state" plus the data-* attributes that
 * say which tables and tabs the row travels between.
 */
(function () {
    'use strict';

    /** SweetAlert is on v6 in most views and v11 in a few. Support both. */
    var TOAST_STYLES =
        '#admin-toast-host{position:fixed;bottom:20px;right:20px;z-index:20000;' +
        'display:flex;flex-direction:column;gap:8px;pointer-events:none}' +
        '.admin-toast{pointer-events:auto;min-width:240px;max-width:380px;padding:11px 13px;' +
        'border-radius:5px;color:#fff;font-size:14px;line-height:1.35;font-family:inherit;' +
        'box-shadow:0 6px 18px rgba(0,0,0,.18);display:flex;align-items:flex-start;gap:9px;' +
        'opacity:0;transform:translateY(6px);transition:opacity .18s ease,transform .18s ease}' +
        '.admin-toast.is-in{opacity:1;transform:none}' +
        '.admin-toast-success{background:#58595b}' +
        '.admin-toast-error{background:#C92228}' +
        '.admin-toast i{margin-top:2px;flex:0 0 auto}' +
        '.admin-toast-close{margin-left:auto;background:none;border:0;color:inherit;' +
        'font-size:17px;line-height:1;cursor:pointer;opacity:.8;padding:0 0 0 6px}' +
        '.admin-toast-close:hover{opacity:1}';

    var STASH_KEY = 'adminHiddenStateMessage';

    /** Hold a message across a page reload so feedback is never lost. */
    function stashMessage(type, text) {
        try {
            sessionStorage.setItem(STASH_KEY, JSON.stringify({type: type, text: text}));
        } catch (e) {
            // Private mode or storage disabled - the reload just loses the message.
        }
    }

    function flushStashedMessage() {
        var raw;
        try {
            raw = sessionStorage.getItem(STASH_KEY);
            if (!raw) {
                return;
            }
            sessionStorage.removeItem(STASH_KEY);
        } catch (e) {
            return;
        }

        var parsed;
        try {
            parsed = JSON.parse(raw);
        } catch (e) {
            return;
        }

        if (parsed && parsed.text) {
            notify(parsed.type === 'error' ? 'error' : 'success', parsed.text);
        }
    }

    function toastHost() {
        var host = document.getElementById('admin-toast-host');
        if (host) {
            return host;
        }

        var style = document.createElement('style');
        style.id = 'admin-toast-styles';
        style.appendChild(document.createTextNode(TOAST_STYLES));
        document.head.appendChild(style);

        host = document.createElement('div');
        host.id = 'admin-toast-host';
        document.body.appendChild(host);
        return host;
    }

    /**
     * Feedback after a state change.
     *
     * Purposely NOT a SweetAlert popup: SweetAlert locks body scrolling while
     * it is open, which froze the page for the whole life of the message, and
     * its toast mode needs newer CSS than several admin views load (it rendered
     * clipped above the viewport). A self-contained toast avoids both.
     */
    /**
     * SweetAlert freezes the page by putting swal2-shown (overflow:hidden) on
     * <html> and <body>. For a message that dismisses itself there is nothing
     * to decide, so drop the lock and let the page keep scrolling behind it.
     */
    function releaseScrollLock() {
        document.documentElement.classList.remove('swal2-shown', 'swal2-height-auto');
        document.body.classList.remove('swal2-shown', 'swal2-height-auto');
    }

    function notify(type, text) {
        var isError = type === 'error';

        // The familiar centred popup with the green check.
        if (window.Swal && typeof window.Swal.fire === 'function') {
            window.Swal.fire({
                title: isError ? 'Error' : 'Success!',
                text: text,
                icon: type,
                timer: isError ? undefined : 2000,
                timerProgressBar: !isError,
                showConfirmButton: isError,
                confirmButtonColor: '#58595b',
                confirmButtonText: 'Close',
                allowOutsideClick: true,
                heightAuto: false,
                scrollbarPadding: false,
                // No animation: SweetAlert tears down on animationend and
                // restores scrolling there, so a stalled animation leaves the
                // page frozen.
                showClass: {popup: '', backdrop: '', icon: ''},
                hideClass: {popup: '', backdrop: '', icon: ''},
                didOpen: releaseScrollLock,
                didClose: releaseScrollLock,
                didDestroy: releaseScrollLock
            });
            return;
        }

        if (typeof window.swal === 'function') {
            window.swal({
                title: isError ? 'Error' : 'Success!',
                text: text,
                type: type,
                timer: isError ? undefined : 2000,
                showConfirmButton: isError,
                confirmButtonColor: '#58595b',
                confirmButtonText: 'Close',
                animation: false
            });
            // v6 has no didOpen hook, so unlock on the next tick and again
            // after the popup has gone.
            setTimeout(releaseScrollLock, 0);
            setTimeout(releaseScrollLock, 2400);
            return;
        }

        // Last resort when no SweetAlert is on the page: a self-contained toast.
        var toast = document.createElement('div');
        toast.className = 'admin-toast admin-toast-' + (isError ? 'error' : 'success');
        toast.setAttribute('role', isError ? 'alert' : 'status');

        var icon = document.createElement('i');
        icon.className = isError ? 'fa fa-exclamation-circle' : 'fa fa-check-circle';
        toast.appendChild(icon);

        var message = document.createElement('span');
        message.textContent = text;
        toast.appendChild(message);

        var close = document.createElement('button');
        close.type = 'button';
        close.className = 'admin-toast-close';
        close.setAttribute('aria-label', 'Dismiss');
        close.innerHTML = '&times;';
        toast.appendChild(close);

        toastHost().appendChild(toast);
        // Next frame, so the entry transition actually runs.
        requestAnimationFrame(function () {
            toast.classList.add('is-in');
        });

        var timer = null;
        function dismiss() {
            if (timer) {
                clearTimeout(timer);
                timer = null;
            }
            toast.classList.remove('is-in');
            setTimeout(function () {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 200);
        }

        close.addEventListener('click', dismiss);
        // Errors stay long enough to read and act on; successes get out of the way.
        timer = setTimeout(dismiss, isError ? 7000 : 3000);

        return toast;
    }

    /**
     * Shrink the confirmation icon. SweetAlert draws it at 5em, which dwarfs
     * the text. Scoped to our own dialog class so the delete and offline
     * confirmations elsewhere on the page keep their existing look.
     */
    function installDialogStyles() {
        if (document.getElementById('admin-state-dialog-styles')) {
            return;
        }

        // Fixed pixel sizing: em units resolve differently between the two
        // SweetAlert builds and collapsed the icon to a sliver.
        var css =
            '.admin-state-dialog .swal2-icon,.swal2-icon.admin-small-icon{' +
            'width:40px!important;height:40px!important;min-height:40px!important;' +
            'border-width:2px!important;margin:6px auto 12px!important;' +
            'font-size:26px!important;line-height:36px!important;' +
            // The older stylesheet some views load runs an error-icon flip
            // animation over this element, which leaves it skewed. Render it flat.
            'animation:none!important;transform:none!important;opacity:1!important}' +
            '.admin-state-dialog .swal2-icon .swal2-icon-content,' +
            '.swal2-icon.admin-small-icon .swal2-icon-content{' +
            'font-size:26px!important;line-height:36px!important}' +
            '.admin-state-dialog .swal2-title{font-size:1.35em}';

        var style = document.createElement('style');
        style.id = 'admin-state-dialog-styles';
        style.appendChild(document.createTextNode(css));
        document.head.appendChild(style);
    }

    /**
     * Ask before changing state. Resolves true only on an explicit confirm.
     *
     * v11 resolves with {isConfirmed}; v6 resolves on confirm and REJECTS on
     * dismiss, which is why the legacy branch passes a rejection handler.
     */
    function confirmAction(goingHidden, label) {
        var title = goingHidden ? 'Hide this ' + label + '?' : 'Move back to Pending?';
        var text = goingHidden
            ? 'It will be taken offline and removed from the pending-to-publish list. You can undo this from the Hidden tab.'
            : 'It will go back to the pending-to-publish list. It stays offline until you publish it.';
        var confirmText = goingHidden ? 'Yes, hide it' : 'Yes, move it back';

        installDialogStyles();

        if (window.Swal && typeof window.Swal.fire === 'function') {
            return window.Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                iconColor: '#58595b',
                showCancelButton: true,
                confirmButtonColor: '#58595b',
                cancelButtonColor: '#676768',
                confirmButtonText: confirmText,
                cancelButtonText: 'Cancel',
                reverseButtons: true,
                // Keep SweetAlert from resizing the page or padding the
                // scrollbar away, which made the layout jump on open/close.
                heightAuto: false,
                scrollbarPadding: false,
                // No open/close animation. SweetAlert tears the dialog down on
                // animationend and restores body scrolling there, so an
                // animation that stalls leaves the page frozen. Without one the
                // teardown - and the scroll unlock - happens immediately.
                showClass: {popup: '', backdrop: '', icon: ''},
                hideClass: {popup: '', backdrop: '', icon: ''},
                customClass: {icon: 'admin-small-icon', popup: 'admin-state-dialog'}
            }).then(function (result) {
                return !!result.isConfirmed;
            });
        }

        if (typeof window.swal === 'function') {
            return window.swal({
                title: title,
                text: text,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#58595b',
                cancelButtonColor: '#676768',
                confirmButtonText: confirmText,
                cancelButtonText: 'Cancel',
                animation: false,          // same reasoning as the v11 branch
                customClass: 'admin-state-dialog'
            }).then(function () {
                return true;
            }, function () {
                return false;   // dismissed
            });
        }

        return Promise.resolve(window.confirm(title + '\n\n' + text));
    }

    function dataTableFor(selector) {
        var node = document.querySelector(selector);
        if (!node || !window.jQuery || !jQuery.fn.dataTable) {
            return null;
        }
        return jQuery.fn.dataTable.isDataTable(node) ? jQuery(node).DataTable() : null;
    }

    /** Rewrite a cloned form so it performs the opposite action. */
    function flipForm(form, nextState) {
        var goingHidden = nextState === 'hidden';

        form.setAttribute('data-state', nextState);
        form.setAttribute(
            'action',
            goingHidden ? form.dataset.unhideUrl : form.dataset.hideUrl
        );

        var button = form.querySelector('button');
        if (!button) {
            return;
        }

        var icon = button.querySelector('i');
        if (icon) {
            icon.className = goingHidden ? 'fa fa-eye' : 'fa fa-eye-slash';
        }

        // Replace the label text node, leaving the icon element alone.
        Array.prototype.forEach.call(button.childNodes, function (node) {
            if (node.nodeType === Node.TEXT_NODE && node.nodeValue.trim()) {
                node.nodeValue = goingHidden ? ' Unhide' : ' Hide';
            }
        });
    }

    /** Tab labels carry their count in a trailing <small>(n)</small>. */
    function bumpTabCount(selector, delta) {
        var tab = document.querySelector(selector);
        if (!tab) {
            return;
        }

        var small = tab.querySelector('small');
        if (!small) {
            return;
        }

        var current = parseInt(small.textContent.replace(/[^\d]/g, ''), 10);
        if (isNaN(current)) {
            return;
        }

        small.textContent = '(' + Math.max(0, current + delta) + ')';
    }

    document.addEventListener('submit', function (event) {
        var form = event.target;
        if (!form.classList || !form.classList.contains('js-hidden-state')) {
            return;
        }

        event.preventDefault();

        var button = form.querySelector('button');
        if (button && button.disabled) {
            return;                       // already in flight
        }
        var goingHidden = form.dataset.state === 'pending';
        var row = form.closest('tr');
        var label = (form.dataset.label || 'item').trim();

        confirmAction(goingHidden, label).then(function (confirmed) {
            if (!confirmed) {
                return;
            }

            // Preview pages have no table to update, so they post normally and
            // let the controller redirect with its flash message.
            if (form.dataset.ajax === 'false') {
                if (button) {
                    button.disabled = true;
                }
                HTMLFormElement.prototype.submit.call(form);
                return;
            }

            send(form, button, goingHidden, row);
        });
    });

    function send(form, button, goingHidden, row) {
        if (button) {
            button.disabled = true;
        }

        var sourceTable = dataTableFor(goingHidden ? form.dataset.pendingTable : form.dataset.hiddenTable);
        var targetTable = dataTableFor(goingHidden ? form.dataset.hiddenTable : form.dataset.pendingTable);
        var token = form.querySelector('input[name="_token"]');

        return fetch(form.getAttribute('action'), {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': token ? token.value : ''
            },
            body: new FormData(form)
        })
            .then(function (response) {
                if (!response.ok) {
                    throw new Error('The server rejected the change (HTTP ' + response.status + ').');
                }
                return response.json();
            })
            .then(function (payload) {
                if (!payload || payload.ok !== true) {
                    throw new Error((payload && payload.message) || 'The change could not be saved.');
                }

                var moved = false;

                if (row && sourceTable && targetTable) {
                    var rowApi = sourceTable.row(row);

                    // Move the row's DATA, not its DOM node. DataTables detaches
                    // hidden columns from the DOM, so a cloned <tr> is short a
                    // few cells and blows up the destination table.
                    var rowData = rowApi.data();

                    if (Array.isArray(rowData)) {
                        var actionIndex = -1;
                        for (var i = rowData.length - 1; i >= 0; i--) {
                            if (typeof rowData[i] === 'string' &&
                                rowData[i].indexOf('js-hidden-state') !== -1) {
                                actionIndex = i;
                                break;
                            }
                        }

                        if (actionIndex !== -1) {
                            var holder = document.createElement('td');
                            holder.innerHTML = rowData[actionIndex];

                            var clonedForm = holder.querySelector('form.js-hidden-state');
                            if (clonedForm) {
                                flipForm(clonedForm, goingHidden ? 'hidden' : 'pending');
                                var clonedButton = clonedForm.querySelector('button');
                                if (clonedButton) {
                                    clonedButton.disabled = false;
                                }
                            }

                            rowData[actionIndex] = holder.innerHTML;

                            targetTable.row.add(rowData).draw(false);
                            rowApi.remove().draw(false);

                            bumpTabCount(goingHidden ? form.dataset.pendingTab : form.dataset.hiddenTab, -1);
                            bumpTabCount(goingHidden ? form.dataset.hiddenTab : form.dataset.pendingTab, 1);

                            // Keep the projects search's id snapshot in step.
                            if (typeof window.refreshProjectTableIds === 'function') {
                                window.refreshProjectTableIds(form.dataset.pendingTable);
                                window.refreshProjectTableIds(form.dataset.hiddenTable);
                            }

                            moved = true;
                        }
                    }
                }

                if (!moved) {
                    // Could not move the row cleanly - reload so the page never
                    // shows a state the database disagrees with. Carry the
                    // message across the reload, otherwise the change looks
                    // like it silently did nothing.
                    if (window.console && console.warn) {
                        console.warn('[hidden-state] row could not be moved in place; reloading.', {
                            haveRow: !!row,
                            haveSourceTable: !!sourceTable,
                            haveTargetTable: !!targetTable
                        });
                    }
                    stashMessage('success', payload.message);
                    window.location.reload();
                    return;
                }

                notify('success', payload.message);
            })
            .catch(function (error) {
                if (button) {
                    button.disabled = false;
                }
                notify('error', error.message || 'Something went wrong.');
            });
    }

    // A message stashed before a reload is shown as soon as this page is ready.
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', flushStashedMessage);
    } else {
        flushStashedMessage();
    }

    // Exposed so the behaviour can be exercised directly in a test page.
    window.adminHiddenState = {
        notify: notify,
        confirmAction: confirmAction,
        stashMessage: stashMessage,
        flushStashedMessage: flushStashedMessage
    };
})();
