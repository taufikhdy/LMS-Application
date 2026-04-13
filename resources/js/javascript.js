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


function getGreeting() {
    const hour = new Date().getHours();

    if (hour >= 5 && hour < 12) {
        return "Selamat Pagi";
    } else if (hour >= 12 && hour < 15) {
        return "Selamat Siang";
    } else if (hour >= 15 && hour < 18) {
        return "Selamat Sore";
    } else {
        return "Selamat Malam";
    }
}

// contoh pakai ke HTML
document.addEventListener("DOMContentLoaded", () => {
    const greetElement = document.getElementById("greeting");

    if (greetElement) {
        greetElement.textContent = getGreeting();
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

document.querySelectorAll('.category-item').forEach(item => {
    const input = item.querySelector('.input-name');
    const btnEdit = item.querySelector('.btn-edit');
    const btnSubmit = item.querySelector('.btn-submit');
    const btnCancel = item.querySelector('.btn-cancel');

    let originalValue = input.value;

    // klik EDIT
    btnEdit.addEventListener('click', () => {
        input.disabled = false;
        input.focus();

        btnEdit.classList.add('hidden');
        btnSubmit.classList.remove('hidden');
        btnCancel.classList.remove('hidden');
    });

    // klik BATAL
    btnCancel.addEventListener('click', () => {
        input.value = originalValue;
        input.disabled = true;

        btnEdit.classList.remove('hidden');
        btnSubmit.classList.add('hidden');
        btnCancel.classList.add('hidden');
    });

    // saat submit (optional update value)
    item.querySelector('.form-edit').addEventListener('submit', () => {
        input.disabled = false; // pastikan terkirim
    });
});
