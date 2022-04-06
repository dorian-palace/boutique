const stripe = Stripe("pk_test_51KbQZXKCaaQvBYoEZ6Kwqy5WYE3nZfvliBpNW2IgErmW9TYxUxwV7K2j14KZWookP4L58l6hqQwvt3bl6HH9xp1R00OFAYT8AD")

const btn = document.querySelector('#btn');
btn.addEventListener('click',()=>{ 

    fetch('/paiement_config.php',{

        method:"POST",
        Headers:{

            'content-type' : 'application/json',
        },

        body: JSON.stringify({})
    }).then(res=> res.json())
    .then(payload => {

        stripe.redirectTOCheckout({sessionID: playload.id})
    })
})