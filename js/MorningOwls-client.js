//javascript functions

// for Copy/Paste of post url

function CopyToClipboard(id)
{
    var dummy = document.createElement('input'),
    text = window.location.href;

    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand('copy');
    document.body.removeChild(dummy);
    document.getElementById("copied").innerHTML = "Link copied!"
}