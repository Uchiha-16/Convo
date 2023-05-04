// Get the editable div
const editor = document.querySelector('.editor');
$(function () {
    $('.content').hide();
    $('#math').change(function () {
        $('.content').hide();
        $('#' + $(this).val()).show();
    });
});
// Execute a command on the editor
// function executeCommand(command, value = null) {
//     document.execCommand(command, false, value);
//     editor.focus();
// }

// Create a link
// function createLink() {
//     console.log('createLink called'); // Add this line
//     const url = prompt('Enter a URL:', 'https://');
//     const selection = window.getSelection();
//     if (url !== null && selection.toString() !== '') {
//         const range = selection.getRangeAt(0);
//         const link = document.createElement('a');
//         link.setAttribute('href', url);
//         link.setAttribute('target', '_blank');
//         link.appendChild(range.extractContents());
//         range.insertNode(link);
//     }
// }

// Add event listener to create link button
// const createLinkButton = document.getElementById('createLink');
// createLinkButton.addEventListener('click', createLink);

// Add event listener for key shortcuts
// editor.addEventListener('keydown', (event) => {
//     const key = event.key.toLowerCase();
//     const isCtrl = event.ctrlKey || event.metaKey;
//     if (isCtrl) {
//         if (key === 'b') {
//             executeCommand('bold');
//             event.preventDefault();
//         } else if (key === 'i') {
//             executeCommand('italic');
//             event.preventDefault();
//         } else if (key === 'u') {
//             executeCommand('underline');
//             event.preventDefault();
//         } else if (key === 's') {
//             executeCommand('strikeThrough');
//             event.preventDefault();
//         } else if (key === 'k') {
//             createLink();
//             event.preventDefault();
//         }
//     }
// });

const text_input = document.getElementById('text-input');
// Get the buttons
const boldBtn = document.getElementById('boldBtn');
const italicBtn = document.getElementById('italicBtn');
const underlineBtn = document.getElementById('underlineBtn');
const strikethroughBtn = document.getElementById('strikethroughBtn');
const subscriptBtn = document.getElementById('subscriptBtn');
const superscriptBtn = document.getElementById('superscriptBtn');
const orderedListBtn = document.getElementById('orderedListBtn');
const unorderedListBtn = document.getElementById('unorderedListBtn');
const linkBtn = document.getElementById('linkBtn');
const unlinkBtn = document.getElementById('unlinkBtn');
const convertBtn = document.getElementById('convertBtn');

// Add event listeners to the buttons
boldBtn.addEventListener('click', addBold);
italicBtn.addEventListener('click', addItalic);
underlineBtn.addEventListener('click', addUnderline);
strikethroughBtn.addEventListener('click', addStrikethrough);
subscriptBtn.addEventListener('click', addSubscript);
superscriptBtn.addEventListener('click', addSuperscript);
orderedListBtn.addEventListener('click', addOrderedList);
unorderedListBtn.addEventListener('click', addUnorderedList);
linkBtn.addEventListener('click', addLink);
unlinkBtn.addEventListener('click', removeLink);
convertBtn.addEventListener('click', convertToHtml);

// Function to add bold tags to selected text
function addBold() {
    document.execCommand('bold', false, null);
    editor.focus();
}

// Function to add italic tags to selected text
function addItalic() {
    document.execCommand('italic', false, null);
    editor.focus();
}

// Function to add underline tags to selected text
function addUnderline() {
    document.execCommand('underline', false, null);
    editor.focus();
}

// Function to add strikethrough tags to selected text
function addStrikethrough() {
    document.execCommand('strikethrough', false, null);
    editor.focus();
}

// Function to add subscript tags to selected text
function addSubscript() {
    document.execCommand('subscript', false, null);
    editor.focus();
}

// Function to add superscript tags to selected text
function addSuperscript() {
    document.execCommand('superscript', false, null);
    editor.focus();
}

// Function to add ordered list tags to selected text
function addOrderedList() {
    document.execCommand('insertOrderedList', false, null);
    editor.focus();
}

// Function to add unordered list tags to selected text
function addUnorderedList() {
    document.execCommand('insertUnorderedList', false, null);
    editor.focus();
}

// Function to add link to selected text
function addLink() {
    const url = prompt('Enter the URL:');
    document.execCommand('createLink', false, url);
    editor.focus();
}

// Function to remove link from selected text
function removeLink() {
    document.execCommand('unlink', false, null);
    editor.focus();
}

// Function to convert the edited text to HTML
function convertToHtml() {
    // Get the edited text
    const editedText = text_input.innerHTML;
    // alert(editedText);
    // Replace the formatting tags with HTML tags
    const htmlText = editedText
        .replace(/<b>/g, '<strong>')
        .replace(/<\/b>/g, '</strong>')
        .replace(/<i>/g, '<em>')
        .replace(/<\/i>/g, '</em>')
        .replace(/<u>/g, '<u>')
        .replace(/<\/u>/g, '</u>')
        .replace(/<strike>/g, '<s>')
        .replace(/<\/strike>/g, '</s>')
        .replace(/<sup>/g, '<sup>')
        .replace(/<\/sup>/g, '</sup>')
        .replace(/<sub>/g, '<sub>')
        .replace(/<\/sub>/g, '</sub>')
        .replace(/<ol>/g, '<ol><li>')
        .replace(/<\/ol>/g, '</li></ol>')
        .replace(/<ul>/g, '<ul><li>')
        .replace(/<\/ul>/g, '</li></ul>')
        .replace(/<li><\/li>/g, '</li><li>');

    // Display the HTML result
    const result = document.getElementById('result');
    result.innerHTML = htmlText;
}

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
    editor.focus();
}



