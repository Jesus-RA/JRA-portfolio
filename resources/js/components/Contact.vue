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
                                <div class="form-group">
                                    <input
                                        type="text"
                                        name="name"
                                        placeholder="Name"
                                        class="form-control bg-transparent text-white border-top-0 border-left-0 border-right-0 shadow-none"
                                        :class="validateName()"
                                        autocomplete="off"
                                        v-model="name"
                                    >
                                    <span class="invalid-feedback">Ingrese su nombre</span>
                                </div>
                            </div>
                
                            <div class="col-6 mt-5">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        name="email"
                                        placeholder="e-mail"
                                        class="form-control bg-transparent text-white border-top-0 border-left-0 border-right-0 shadow-none"
                                        :class="validateEmail()"
                                        autocomplete="email"
                                        
                                        v-model="email"
                                    >
                                    <span class=" invalid-feedback">Ingrese un email válido</span>
                                </div>
                            </div>
                
                            <div class="col-12 my-4">
                                <div class="form-group">
                                    <textarea
                                        name="message"
                                        id="message"
                                        rows="5"
                                        class="form-control myTextarea bg-transparent border-top-0 border-left-0 border-right-0 shadow-none text-white"
                                        :class="validateMessage()"
                                        placeholder="Leave a message"
                                        autocomplete="off"
                                        v-model="message"
                                    ></textarea>
                                    <span
                                        class="float-right mt-1"
                                        id="counterMessage"
                                        :class="validateMessageLength()"
                                    > {{ this.message.length }} /50 mínimo</span>
                                </div>
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
    data(){
        return {
            name : '',
            email : '',
            message: '',
            validName : false,
            validEmail : false,
            validMessage : false,
        }
    },
    methods: {
        sendMail(){

            event.preventDefault();

            this.$swal.showLoading();

            const params = {
                name : this.name,
                email : this.email,
                message : this.message,
            }
            
            if( this.validateForm() ){

                axios.post('/contact', params)
                    .then(response => {

                        this.$swal({
                            title : '¡Mensaje enviado!',
                            text : '¡Gracias por contactarme, te responderé pronto!',
                            icon : 'success',
                            confirmButtonColor: '#6C6',
                        });

                        this.clearInputClasses()
                    })
                    .catch(error => {
                        console.log(error)
                        this.$swal({
                            title : 'No ha sido posible enviar tu mensaje!',
                            text : 'Por favor vuelve a intentarlo',
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
                this.addErrorClass()
            }

            
        },
        validateForm(){
            
            if(this.validName && this.validEmail && this.validMessage){

                return true

            }

            return false

        },
        addErrorClass(){

            const inputs = document.querySelectorAll('.form-control')

            document.getElementById('counterMessage').classList.replace('text-white', 'text-danger')
            
            for(const input of inputs){
                if(!input.classList.contains('is-valid')){
                    input.classList.add('is-invalid')
                }
            }

        },
        clearInputClasses(){

            const inputs = document.querySelectorAll('.form-control')
            
            for(const input of inputs){
                input.classList.remove('is-valid', 'is-invalid')
            }

            document.getElementById('counterMessage').classList.remove('text-success', 'text-danger')
            

            this.name = ''
            this.email = ''
            this.message = ''

            this.validName = false
            this.validEmail = false
            this.validMessage = false
        },
        validateName(event){

            if(this.name.length === 0){
                this.validName = false
                return ''
            }

            const regex = /^[a-zA-Zá-ú ]+$/i

            if(regex.test(this.name) && this.name.length > 3){
                this.validName = true
                return ['is-valid', 'text-white']
            }

            this.validName = false
            return ['is-invalid', 'text-danger']

        },
        validateEmail(){

            if(this.email.length > 0){

                const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                if( regex.test(this.email) ){

                    this.validEmail = true
                    return ['is-valid', 'text-white']

                }else{

                    this.validEmail = false
                    return ['is-invalid', 'text-danger']

                }

            }
            this.validEmail = false

        },
        validateMessage(event){

            
            if(this.message.length === 0){
                return ''
            }

            if(this.message.length >= 50){
                
                this.validMessage = true
                return 'is-valid'

            }else{
                
                this.validMessage = false
                return ['is-invalid', 'text-danger']
            }

        },
        validateMessageLength(){
            
            if(this.message.length === 0){
                this.validMessage = false
                return 'text-white'
            }
            
            return this.message.length > 50 ? 'text-success' : 'text-danger';
        }
    }
}
</script>