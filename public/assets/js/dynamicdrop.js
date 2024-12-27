function appendSelectedValue() {
    /*
    initialize primary symbols */
    /*
    @param prefixSelect dropdown
    @param suffixSelect html dropdown
    */
    const prefixSelect      = document.getElementById('prefix');
    const suffixSelect      = document.getElementById('suffix');
    const newItemInput      = document.getElementById('newItemInput');
    const appendedData   = document.getElementById('appendedData');
    const oldAppended       = document.getElementById('oldAppendedData');
    const currentHref = window.location.href;
    let appdedChildsList = appendedData.childNodes;
    let oldAppdedChildsList = oldAppended.childNodes;

    const anchor = document.createElement('a');
    anchor.href = appdedChildsList[0].href;
    anchor.textContent = appdedChildsList[0].href;
    anchor.target = '_blank';

    appendedData.innerHTML = '';
    appendedData.appendChild(anchor);

    const childsOfAppend    = appendedData.childNodes;
    const childsOfOldAppend =     oldAppended.childNodes;
    oldAppended.innherHTML  = appendedData.innerHTML;
    childsOfAppend.forEach(anchor => {
        anchor.href = appendedData.textContent;
    });
    const selectedPrefix = prefixSelect.value;
    const existingAnchor = appendedData;

    const prefix = prefixSelect.value;
    const suffix = suffixSelect.value;
    const newItemValue = newItemInput.value.trim();

    if (newItemValue) {
        const userAdded = newItemValue;
        let stringTest = appendedData.textContent;
        let StringLength = stringTest.length;
        if (StringLength > 1) {
            existingAnchor.textContent = stringTest;
        }

        const appendedValue = stringTest + userAdded;

        newItemInput.value = ''; // Clear input field

        const appendedDataInner = appendedData.textContent;
        appendedData.textContent = appendedValue;
        childsOfAppend.forEach(anchor => {
            anchor.href = appendedData.textContent;
        });
    }
}

function updateAppendedData() {
    const prefixSelect = document.getElementById('prefix');
    const suffixSelect = document.getElementById('suffix');
    const demos = document.getElementById('demos');
    const appendedData = document.getElementById('appendedData');
    const oldAppended = document.getElementById('oldAppendedData');
    const childsOfAppend = appendedData.childNodes;
    const childsOfOldAppend = oldAppended.childNodes;
    oldAppended.innherHTML = appendedData.innerHTML;
    childsOfAppend.forEach(anchor => {
        anchor.href = appendedData.textContent;
    });

    const prefix = prefixSelect.value;
    const suffix = suffixSelect.value;

    let href = 'https://';
    if (prefix !== '') {
        href = href + prefix + '.' + suffix + '/';
    } else {
        href = href + suffix + '/';
    }

    const anchor = document.createElement('a');
    anchor.href = href;
    anchor.textContent = href;
    anchor.target = '_blank';

    appendedData.innerHTML = '';
    appendedData.appendChild(anchor);
}