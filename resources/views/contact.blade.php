@extends('partials.base')


@section('content')
@include('partials.navbar')

<section class="Contact">
    <div class="container">
        <div class="contact_details">
            <h2>Contact Us</h2>
            <div class="text">
                <p>Feel free to contact us for any questions or concerns.</p>
                <p>You can also send us a positive thank you message.</p>
            </div>

            <div class="enquiries">
                <h3>Enquiries</h3>
                <p><i class="fa fa-envelope"></i> alexwambuik@gmail.com</p>
                <p><i class="fa fa-phone-alt"></i> +254 746 055 487</p>
                <p><i class="fa fa-envelope"></i> mwangilawrence661@gmail.com</p>
                <p><i class="fa fa-phone-alt" aria-hidden="true"></i> +254 799 509 242</p>
            </div>
        </div>

        <div class="contact_form">
            <form action="" method="post">
                <input type="text" name="full_name" id="full_name" placeholder="Full Name" />
                <input type="email" name="email" id="email" placeholder="Email Address" />
                <textarea name="message" id="message" cols="30" rows="10">Enter your Message</textarea>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
</section>

@include('partials.footer')
@endsection
