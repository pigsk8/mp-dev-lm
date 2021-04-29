/*
if($("#preference_id").length){

    var preference_id = document.getElementById("preference_id").value;

    // Agrega credenciales de SDK
    const mp = new MercadoPago("APP_USR-a98b17ae-47a6-4a35-b92d-01919002b97e", {
        locale: "es-AR",
    });

    // Inicializa el checkout
    const checkout = mp.checkout({
        preference: {
            id: preference_id,
        },
    });

    checkout.render({
        container: ".cho-container",
        label: "Pagar la compra",
    });
}
*/
