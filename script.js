/* Update cart count */
function updateCartCount() {

    fetch("cart_count.php")
    .then(res => res.text())
    .then(count => {

        const cart = document.getElementById("cart-count");

        if(cart){
            cart.innerText = count;
        }
    });
}

/* Run when page loads */
updateCartCount();