// Get the editable div
const editor = document.querySelector('.editor');
$(function () {
    $('.content').hide();
    $('#math').change(function () {
        $('.content').hide();
        $('#' + $(this).val()).show();
    });
});

const fontSizeSelect = document.getElementById('fontSize');
// Set the default font size to 3 (12px)
fontSizeSelect.value = '3';
// Listen for changes to the font size select
fontSizeSelect.addEventListener('change', () => {
    // Get the selected font size
    const fontSize = fontSizeSelect.value;
    // Apply the font size to the selected text
    document.execCommand('fontSize', false, fontSize);
    // Remove the selection after applying the font size
    window.getSelection().removeAllRanges();
});

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
}

// Function to add italic tags to selected text
function addItalic() {
    document.execCommand('italic', false, null);
}

// Function to add underline tags to selected text
function addUnderline() {
    document.execCommand('underline', false, null);
}

// Function to add strikethrough tags to selected text
function addStrikethrough() {
    document.execCommand('strikethrough', false, null);
    editor.focus();
}

// Function to add subscript tags to selected text
function addSubscript() {
    document.execCommand('subscript', false, null);
}

// Function to add superscript tags to selected text
function addSuperscript() {
    document.execCommand('superscript', false, null);
}

// Function to add ordered list tags to selected text
function addOrderedList() {
    document.execCommand('insertOrderedList', false, null);
    editor.focus();
}

// Function to add unordered list tags to selected text
function addUnorderedList() {
    document.execCommand('insertUnorderedList', false, null);
}

// Function to add link to selected text
function addLink() {
    const url = prompt('Enter the URL:');
    document.execCommand('createLink', false, url);
}

// Function to remove link from selected text
function removeLink() {
    document.execCommand('unlink', false, null);
}

// Function to convert the edited text to HTML
function convertToHtml() {
    // Get the edited text
    const editedText = text_input.innerHTML;
    // alert(editedText);
    // Replace the formatting tags with HTML tags
    // const htmlText = editedText
    //     .replace(/<a\s+href="([^"]+)"[^>]*>(.*?)<\/a>/g, '<a href="$1">$2</a>')
    //     .replace(/<div>/g, '<br>')
    //     .replace(/<\/div>/g, '')
    //     // .replace(/<br>/g, '\n')
    //     // .replace(/\r?\n/g, '\n')
    //     .replace(/&nbsp;/g, ' ')
    //     .replace(/<b>/g, '<strong>')
    //     .replace(/<\/b>/g, '</strong>')
    //     .replace(/<i>/g, '<em>')
    //     .replace(/<\/i>/g, '</em>')
    //     .replace(/<u>/g, '<u>')
    //     .replace(/<\/u>/g, '</u>')
    //     .replace(/<strike>/g, '<s>')
    //     .replace(/<\/strike>/g, '</s>')
    //     .replace(/<sup>/g, '<sup>')
    //     .replace(/<\/sup>/g, '</sup>')
    //     .replace(/<sub>/g, '<sub>')
    //     .replace(/<\/sub>/g, '</sub>')
    //     .replace(/<ol>/g, '<ol><li>')
    //     .replace(/<\/ol>/g, '</li></ol>')
    //     .replace(/<ul>/g, '<ul><li>')
    //     .replace(/<\/ul>/g, '</li></ul>')
    //     .replace(/<li><\/li>/g, '</li><li>');

    // Display the HTML result
    const result = document.getElementById('result');
    result.innerHTML = editedText;
    alert(result.value);
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


