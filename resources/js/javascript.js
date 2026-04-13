window.addEventListener('beforeunload', function () {
        localStorage.setItem('scrollPosition', window.scrollY);
    });

window.addEventListener('load', function () {
    let scrollPosition = localStorage.getItem('scrollPosition');
        if (scrollPosition) {
            window.scrollTo(0, scrollPosition);
            localStorage.removeItem('scrollPosition');
    }
});


const alert = document.getElementById('alert');
if(alert){
    setTimeout(() => {
        alert.classList.add('alert-hide');
            setTimeout(() => {
                alert.remove();
        }, 500);
    }, 2000);
}
