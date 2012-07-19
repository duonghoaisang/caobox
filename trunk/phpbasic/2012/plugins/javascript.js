function insert_text_to_area(obj,tagOpen, tagClose, sampleText,cls) {
	var clientPC = navigator.userAgent.toLowerCase(); // Get client info
	var is_gecko = ((clientPC.indexOf('gecko')!=-1) && (clientPC.indexOf('spoofer')==-1)&& (clientPC.indexOf('khtml') == -1) && (clientPC.indexOf('netscape/7.0')==-1));
	//var txtarea = obj;
	var txtarea = $(obj).find('form textarea')[0];
	if (document.selection  && !is_gecko) {
		var theSelection = document.selection.createRange().text;
		if (!theSelection) {
			theSelection=sampleText;
		}
		txtarea.focus();
		if (theSelection.charAt(theSelection.length - 1) == " ") { // exclude ending space char, if any
			theSelection = theSelection.substring(0, theSelection.length - 1);
			document.selection.createRange().text = tagOpen + theSelection + tagClose + " ";
		} else {
			document.selection.createRange().text = tagOpen + theSelection + tagClose;
		}
	// Mozilla
	} else if(txtarea.selectionStart || txtarea.selectionStart == '0') {
		var replaced = false;
		var startPos = txtarea.selectionStart;
		var endPos = txtarea.selectionEnd;
		if (endPos-startPos) {
			replaced = true;
		}
		var scrollTop = txtarea.scrollTop;
		var myText = (txtarea.value).substring(startPos, endPos);
		if (!myText) {
			myText=sampleText;

		}

		var subst;

		if (myText.charAt(myText.length - 1) == " ") { // exclude ending space char, if any

			subst = tagOpen + myText.substring(0, (myText.length - 1)) + tagClose + " ";

		} else {

			subst = tagOpen + myText + tagClose;

		}

		txtarea.value = txtarea.value.substring(0, startPos) + subst +

			txtarea.value.substring(endPos, txtarea.value.length);

		txtarea.focus();

		if (replaced) {

			var cPos = startPos+(tagOpen.length+myText.length+tagClose.length);

			txtarea.selectionStart = cPos;

			txtarea.selectionEnd = cPos;

		} else {

			txtarea.selectionStart = startPos+tagOpen.length;

			txtarea.selectionEnd = startPos+tagOpen.length+myText.length;

		}

		txtarea.scrollTop = scrollTop;

	}

	if (txtarea.createTextRange) {

		txtarea.caretPos = document.selection.createRange().duplicate();

	}

}