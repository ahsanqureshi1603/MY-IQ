$(document).ready(function () {
    // To check if math option is selected then hides options 
    const handleSelectDrop = (el) => {
        const element = el;
        const selectName = $(element).data('select');
        const value = $(element).val();
        selectReducer(selectName, value);
    }

    /**
     * 
     * hides the 
     * @param {String} selector, name of the data-select for select element.
     * @param {String} key, is the name for data-notshow inside selector in the blade file.
     */
    const toggleOptions = (selector = null, key = null) => {
        if (selector && typeof selector === 'string') {
            const element = $(`select[data-select="${selector}"]`);
            if (element.length) {
                $(element).find('option').show();
                if (key && key.length) {
                    //chack is value is selected that contains data-notshow then change value
                    const elValue = $(element).val();
                    const selectedOpEl = $(element).find(`option[value="${elValue}"]`)
                    const isContain = selectedOpEl.data('notshow') ? true : false;
                    if (isContain) {
                        // gets available options user can select
                        const optionsAvail = $(element).find(`option:not([data-notshow="${key}"])`);
                        $(element).val($(optionsAvail).eq(0).val());
                    }
                    const options = $(element).find(`[data-notshow="${key}"]`);
                    $(options).hide()
                }
            }

        }
    }


    const selectReducer = (name = '', value = '') => {
        switch (name) {
            case 'category':
                if (value === 'math') {
                    // hide what can't be selected 
                    toggleOptions('section', 'math');
                    // if user non selected value is beign selected change value to available  
                } else {
                    toggleOptions('section');
                }
                break;
            default:
            // code block

        }
    }
    // on load
    const initialCategorySelect = $(`select[data-select="category"]`);
    handleSelectDrop(initialCategorySelect);

    $('.select-drop').on('change', function () {
        handleSelectDrop(this)
    })
});