"use strict";

// Class definition
var KTAppInboxReply = function () {

    // Private functions
    const handlePreviewText = () => {
        // Get all messages
        const accordions = document.querySelectorAll('[data-kt-inbox-message="message_wrapper"]');
        accordions.forEach(accordion => {
            // Set variables
            const header = accordion.querySelector('[data-kt-inbox-message="header"]');
            const previewText = accordion.querySelector('[data-kt-inbox-message="preview"]');
            const details = accordion.querySelector('[data-kt-inbox-message="details"]');
            const message = accordion.querySelector('[data-kt-inbox-message="message"]');

            // Init bootstrap collapse -- more info: https://getbootstrap.com/docs/5.1/components/collapse/#via-javascript
            const collapse = new bootstrap.Collapse(message, { toggle: false });

            // Handle header click action
            header.addEventListener('click', e => {
                // Return if KTMenu or buttons are clicked
                if (e.target.closest('[data-kt-menu-trigger="click"]') || e.target.closest('.btn')) {
                    return;
                } else {
                    previewText.classList.toggle('d-none');
                    details.classList.toggle('d-none');
                    collapse.toggle();
                }
            });
        });
    }

    // Init reply form
    const initForm = () => {
        // Set variables
        const form = document.querySelector('#kt_inbox_reply_form');
        const allTagify = form.querySelectorAll('[data-kt-inbox-form="tagify"]');

        // Handle submit form
        handleSubmit(form);

        // Init tagify
        allTagify.forEach(tagify => {
            initTagify(tagify);
        });

        // Init quill editor
        initQuill(form);

        // Init dropzone
        initDropzone(form);
    }

    // Handle submit form
    const handleSubmit = (el) => {
        const submitButton = el.querySelector('[data-kt-inbox-form="send"]');

        // Handle button click event
        submitButton.addEventListener("click", function () {
            // Activate indicator
            submitButton.setAttribute("data-kt-indicator", "on");

            // Disable indicator after 3 seconds
            setTimeout(function () {
                submitButton.removeAttribute("data-kt-indicator");
            }, 3000);
        });
    }

    // Init tagify
    const initTagify = (el) => {
        var inputElm = el;

        const usersList = [];

        function tagTemplate(tagData) {
            return `
                <tag title="${(tagData.title || tagData.email)}"
                        contenteditable='false'
                        spellcheck='false'
                        tabIndex="-1"
                        class="${this.settings.classNames.tag} ${tagData.class ? tagData.class : ""}"
                        ${this.getAttributes(tagData)}>
                    <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
                    <div class="d-flex align-items-center">
                        <div class='tagify__tag__avatar-wrap ps-0'>
                            <img onerror="this.style.visibility='hidden'" class="rounded-circle w-25px me-2" src="${hostUrl}media/${tagData.avatar}">
                        </div>
                        <span class='tagify__tag-text'>${tagData.name}</span>
                    </div>
                </tag>
            `
        }

        function suggestionItemTemplate(tagData) {
            return `
                <div ${this.getAttributes(tagData)}
                    class='tagify__dropdown__item d-flex align-items-center ${tagData.class ? tagData.class : ""}'
                    tabindex="0"
                    role="option">

                    ${tagData.avatar ? `
                            <div class='tagify__dropdown__item__avatar-wrap me-2'>
                                <img onerror="this.style.visibility='hidden'"  class="rounded-circle w-50px me-2" src="${hostUrl}media/${tagData.avatar}">
                            </div>` : ''
                }

                    <div class="d-flex flex-column">
                        <strong>${tagData.name}</strong>
                        <span>${tagData.email}</span>
                    </div>
                </div>
            `
        }

        // initialize Tagify on the above input node reference
        var tagify = new Tagify(inputElm, {
            tagTextProp: 'name', // very important since a custom template is used with this property as text. allows typing a "value" or a "name" to match input with whitelist
            enforceWhitelist: true,
            skipInvalid: true, // do not remporarily add invalid tags
            dropdown: {
                closeOnSelect: false,
                enabled: 0,
                classname: 'users-list',
                searchKeys: ['name', 'email']  // very important to set by which keys to search for suggesttions when typing
            },
            templates: {
                tag: tagTemplate,
                dropdownItem: suggestionItemTemplate
            },
            whitelist: usersList
        })

        tagify.on('dropdown:show dropdown:updated', onDropdownShow)
        tagify.on('dropdown:select', onSelectSuggestion)

        var addAllSuggestionsElm;

        function onDropdownShow(e) {
            var dropdownContentElm = e.detail.tagify.DOM.dropdown.content;

            if (tagify.suggestedListItems.length > 1) {
                addAllSuggestionsElm = getAddAllSuggestionsElm();

                // insert "addAllSuggestionsElm" as the first element in the suggestions list
                dropdownContentElm.insertBefore(addAllSuggestionsElm, dropdownContentElm.firstChild)
            }
        }

        function onSelectSuggestion(e) {
            if (e.detail.elm == addAllSuggestionsElm)
                tagify.dropdown.selectAll.call(tagify);
        }

        // create a "add all" custom suggestion element every time the dropdown changes
        function getAddAllSuggestionsElm() {
            // suggestions items should be based on "dropdownItem" template
            return tagify.parseTemplate('dropdownItem', [{
                class: "addAll",
                name: "Add all",
                email: tagify.settings.whitelist.reduce(function (remainingSuggestions, item) {
                    return tagify.isTagDuplicate(item.value) ? remainingSuggestions : remainingSuggestions + 1
                }, 0) + " Members"
            }]
            )
        }
    }

    // Init quill editor
    const initQuill = (el) => {
        var quill = new Quill('#kt_inbox_form_editor', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline', 'link'],
                ]
            },
            placeholder: 'Type your text here...',
            theme: 'snow' // or 'bubble'
        });

        // Customize editor
        const toolbar = el.querySelector('.ql-toolbar');

        if (toolbar) {
            const classes = ['px-5', 'border-top-0', 'border-start-0', 'border-end-0'];
            toolbar.classList.add(...classes);
        }

        const toolbar2 = el.querySelector('[data-inbox="dismiss"]');
        const clearButton = document.createElement('a');

        clearButton.innerHTML = `<span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                </svg>
                                </span>`;
        clearButton.addEventListener('click', () => {
            quill.setText('');
        });

        // Append the clear button to the toolbar
        toolbar2.appendChild(clearButton);

    }

    // Init dropzone
    const initDropzone = (el) => {
        // set the dropzone container id
        const id = '[data-kt-inbox-form="dropzone"]';
        const dropzone = el.querySelector(id);
        const uploadButton = el.querySelector('[data-kt-inbox-form="dropzone_upload"]');

        // set the preview element template
        var previewNode = dropzone.querySelector(".dropzone-item");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone = new Dropzone(id, { // Make the whole body a dropzone
            url: "https://preview.keenthemes.com/api/dropzone/void.php", // Set the url for your upload script location
            parallelUploads: 20,
            maxFilesize: 1, // Max filesize in MB
            previewTemplate: previewTemplate,
            previewsContainer: id + " .dropzone-items", // Define the container to display the previews
            clickable: uploadButton // Define the element that should be used as click trigger to select files.
        });


        myDropzone.on("addedfile", function (file) {
            // Hookup the start button
            const dropzoneItems = dropzone.querySelectorAll('.dropzone-item');
            dropzoneItems.forEach(dropzoneItem => {
                dropzoneItem.style.display = '';
            });
        });

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function (progress) {
            const progressBars = dropzone.querySelectorAll('.progress-bar');
            progressBars.forEach(progressBar => {
                progressBar.style.width = progress + "%";
            });
        });

        myDropzone.on("sending", function (file) {
            // Show the total progress bar when upload starts
            const progressBars = dropzone.querySelectorAll('.progress-bar');
            progressBars.forEach(progressBar => {
                progressBar.style.opacity = "1";
            });
        });

        // Hide the total progress bar when nothing"s uploading anymore
        myDropzone.on("complete", function (progress) {
            const progressBars = dropzone.querySelectorAll('.dz-complete');

            setTimeout(function () {
                progressBars.forEach(progressBar => {
                    progressBar.querySelector('.progress-bar').style.opacity = "0";
                    progressBar.querySelector('.progress').style.opacity = "0";
                });
            }, 300);
        });
    }


    // Public methods
    return {
        init: function () {
            handlePreviewText();
            initForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppInboxReply.init();
});
