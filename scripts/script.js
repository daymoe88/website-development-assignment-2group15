function init()
{
    // define event handlers
    let deleteAccntBtn = document.getElementById("delete-accnt-btn");
    deleteAccntBtn.addEventListener("click", deleteWarning);

    let logoutBtn = document.getElementById("logout-btn");
    logoutBtn.addEventListener("click", logoutWarning);
}

/*
    Handler function to display a warning to users attempting to delete their accounts
*/
function deleteWarning(event)
{
    if (!confirm('Are you sure you would like to delete your account?\n\nIf you proceed, your current shopping cart and purchase history will be lost.'))
    {
        // if the user clicks cancel, then cancel the event
        event.preventDefault();
    }
}

/*
    Handler function to display a warning to users attempting to log out of their account
*/
function logoutWarning(event)
{
    if (!confirm('Are you sure you want to sign out?'))
    {
        // if the user clicks cancel, then cancel the event
        event.preventDefault();
    }
}

init();