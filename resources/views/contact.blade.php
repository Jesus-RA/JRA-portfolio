<div class="row myContact">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8 mx-auto my-auto">
        <div class="card border border-dark myCard">
            <h1 class="text-center">Get in touch</h1>
            <form action="#about" id="formContact">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-6 mt-5">
                            <input type="text" name="name" placeholder="Name" class="myForm" autocomplete="off" required>
                        </div>
            
                        <div class="col-6 mt-5">
                            <input type="text" name="email" placeholder="e-mail" class="myForm" autocomplete="off" required>
                        </div>
            
                        <div class="col-12 my-auto">
                            <textarea name="message" id="message" rows="5" class="myForm myTextarea" placeholder="Leave a message" autocomplete="off" required></textarea>
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