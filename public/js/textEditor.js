// Get the editable div
const editor = document.querySelector('.editor');

// Execute a command on the editor
function executeCommand(command, value = null) {
    document.execCommand(command, false, value);
    editor.focus();
}

// Create a link
function createLink() {
    console.log('createLink called'); // Add this line
    const url = prompt('Enter a URL:', 'https://');
    const selection = window.getSelection();
    if (url !== null && selection.toString() !== '') {
        const range = selection.getRangeAt(0);
        const link = document.createElement('a');
        link.setAttribute('href', url);
        link.setAttribute('target', '_blank');
        link.appendChild(range.extractContents());
        range.insertNode(link);
    }
}

// Add event listener to create link button
const createLinkButton = document.getElementById('createLink');
createLinkButton.addEventListener('click', createLink);

// Add event listener for key shortcuts
editor.addEventListener('keydown', (event) => {
    const key = event.key.toLowerCase();
    const isCtrl = event.ctrlKey || event.metaKey;
    if (isCtrl) {
        if (key === 'b') {
            executeCommand('bold');
            event.preventDefault();
        } else if (key === 'i') {
            executeCommand('italic');
            event.preventDefault();
        } else if (key === 'u') {
            executeCommand('underline');
            event.preventDefault();
        } else if (key === 's') {
            executeCommand('strikeThrough');
            event.preventDefault();
        } else if (key === 'k') {
            createLink();
            event.preventDefault();
        }
    }
});

function insertSymbol(symbol) {
    // Get the current cursor position in the editable div element
    var selection = window.getSelection();
    var range = selection.getRangeAt(0);
    var currentStart = range.startOffset;
    // Insert the symbol at the current cursor position
    range.insertNode(document.createTextNode(symbol));
    // Move the cursor to the end of the inserted symbol
    range.setStart(range.startContainer, currentStart + symbol.length);
    range.setEnd(range.startContainer, currentStart + symbol.length);
    selection.removeAllRanges();
    selection.addRange(range);
}

$(function () {
    $('.content').hide();
    $('#math').change(function () {
        $('.content').hide();
        $('#' + $(this).val()).show();
    });
});