<div class="row myContact">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8 mx-auto my-auto">
        <div class="card border border-dark myCard opaque" id="contactCard">
            <h2 class="text-center">Get in touch</h2>
            <form action="{{ route('contacts.store') }}" method="POST" id="formContact">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-6 mt-5">
                            <input type="text" name="name" placeholder="Name" class="myForm @error('name') errorForm @enderror" autocomplete="off" onkeyup="contactActive()" >
                            @error('name')
                                <span class="invalid-feedback d-block errorSpan" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
            
                        <div class="col-6 mt-5">
                            <input type="text" name="email" placeholder="e-mail" class="myForm @error('name') errorForm @enderror" autocomplete="email" onkeyup="contactActive()" >
                            @error('email')
                                <span class="invalid-feedback d-block errorSpan" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
            
                        <div class="col-12 my-auto">
                            <textarea name="message" id="message" rows="5" class="myForm myTextarea @error('name') errorForm @enderror" placeholder="Leave a message" autocomplete="off" onkeyup="contactActive()" ></textarea>
                            @error('message')
                                <span class="invalid-feedback d-block errorSpan">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark btn-block">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>        
    </div>
</div>

@section('scripts')
    <script>

        function contactActive(){
                event.target.classList.add('activeForm');
                
                const contactCard = document.getElementById('contactCard');
                contactCard.classList.remove('opaque');
                
                const inputs = document.querySelectorAll('.myForm');
                let inputsEmpty = 0;
                for(input of inputs){
                    if(input.value.length === 0) {
                        inputsEmpty++
                    }
                }
                // When inputs was emptied contact card comes back to be opaque
                if(inputsEmpty === 3){
                    contactCard.classList.add('opaque');
                    for(input of inputs){
                        input.classList.remove('activeForm');
                    }
                }
            
        }

        
    </script>
@endsection