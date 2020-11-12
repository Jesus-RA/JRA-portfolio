<template>
    <div class="row myContact" data-aos="zoom-in-up">
        <div class="col-md-10 col-lg-8 mx-auto my-auto">
            <div class="card border border-dark myCard" id="contactCard">
                <h2 class="text-center">Get in touch</h2>
                <p class="text-center mt-3 px-4">
                    If you have some projects you need to build, just let me know!
                </p>
                <form id="contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 mt-5">
                                <input type="text" name="name" placeholder="Name" class="myForm" autocomplete="off" @keyup="contactActive">
                            </div>
                
                            <div class="col-6 mt-5">
                                <input type="text" name="email" placeholder="e-mail" class="myForm" autocomplete="email" @keyup="contactActive" >
                            </div>
                
                            <div class="col-12 my-auto">
                                <textarea name="message" id="message" rows="5" class="myForm myTextarea" placeholder="Leave a message" autocomplete="off" @keyup="contactActive" ></textarea>
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-outline-light btn-block" @click="sendMail">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>        
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        makeContactOpaque(){
            const contactCard = document.getElementById('contactCard');
            contactCard.classList.remove('opaque');
            
            const inputs = document.querySelectorAll('.myForm');

            if(!this.validarCampos(inputs)){
                contactCard.classList.add('opaque');
                for(const input of inputs){
                    input.classList.remove('activeForm');
                }
            }
        },
        sendMail(){
            event.preventDefault();
            this.$swal.showLoading();

            const inputs = document.querySelectorAll('.myForm')

            let form = document.querySelector('form#contact')
            const data = new FormData(form);

            const params = {
                name : data.get('name'),
                email : data.get('email'),
                message : data.get('message'),
            }
            
            if(this.validarCampos() == true){

                axios.post('/contact', params)
                    .then(response => {
                        this.$swal({
                            title : '¡Mensaje enviado!',
                            text : '¡Gracias por contactarme, te responderé pronto!',
                            icon : 'success',
                            confirmButtonColor: '#6C6',
                        });
                        this.removeErrorClass(inputs);
                        this.makeContactOpaque();
                        this.cleanInputs(inputs)
                    })
                    .catch(error => {
                        this.$swal({
                            title : '¡Campos vacíos!',
                            text : 'Debes llenar todos los campos',
                            icon : 'error',
                            confirmButtonColor: '#FF0000',
                        })
                    })
            }else{
                this.$swal({
                    title : '¡Campos vacíos!',
                    text : 'Debes llenar todos los campos',
                    icon : 'error',
                    confirmButtonColor: '#FF0000',
                })
                this.addErrorClass(inputs)
            }

            
        },
        validarCampos(){
            const inputs = document.querySelectorAll('.myForm')
            let empty = 0;
            for(const input of inputs){
                if(input.value.length === 0) {
                    empty++
                }
            }
            if(empty === 3){
                return false;
            }

            return true;
        },
        addErrorClass(inputs){
            for(const input of inputs){
                input.classList.add('errorForm')
                input.classList.add('errorSpan')
            }
        },
        removeErrorClass(inputs){
            for(const input of inputs){
                input.classList.remove('errorForm')
                input.classList.remove('errorSpan')
            }
        },
        cleanInputs(inputs){
            for(const input of inputs){
                input.value = '';
            }
        },
        contactActive(){
            event.target.classList.add('activeForm');
            this.makeContactOpaque();
        }
    }
}
</script>