// Функція для перенаправлення на сторінку деталей подорожі
function goToDetails(page) {
    window.location.href = page;
}

// Функція для показу повідомлення про підтвердження замовлення
function submitOrder() {
    const cardNumber = document.getElementById('card-number').value;

    if (cardNumber === '') {
        alert('Будь ласка, введіть номер кредитної картки');
    } else {
        alert('Замовлення оформлено!');
        window.location.href = 'payment_confirmation.html';
    }
}

// Функція для обробки форми контактів
function submitContactForm() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    if (name === '' || email === '' || message === '') {
        alert('Будь ласка, заповніть всі поля');
    } else {
        alert('Дякуємо за ваше повідомлення! Ми зв\'яжемося з вами найближчим часом.');
        // Тут можна додати додатковий код для обробки форми, наприклад, відправка даних на сервер
    }
}

// Додавання обробників подій для зображень на сторінці подорожей
document.addEventListener('DOMContentLoaded', function() {
    const lvivImage = document.getElementById('lviv-image');
    const carpathiansImage = document.getElementById('carpathians-image');

    if (lvivImage) {
        lvivImage.addEventListener('click', function() {
            goToDetails('lviv_details.html');
        });
    }

    if (carpathiansImage) {
        carpathiansImage.addEventListener('click', function() {
            goToDetails('carpathians_details.html');
        });
    }
});

