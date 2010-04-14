function closeModalbox()
{
	if ($('closeModalbox')) {
		// hide the modal box
		Modalbox.hide();
		// refresh the current page
		location.reload(true);
	} else {
		// resize to content (in case of validation error messages)
		Modalbox.resizeToContent()
	}
	return true;
}

function toggleView(whatClass, mode){
	var elements = $$("."+whatClass);
	if (elements.size() > 0) {
		for (var index = 0, length = elements.size(); index < length; ++index)	{
			if(mode)
                Effect.Appear(elements[index]);
            else
                Effect.Fade(elements[index]);
		}
	}
}
