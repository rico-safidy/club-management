@extends('user.layouts.master')

@section('title')
    Contact
@endsection

@section('content')
    <section class="section contact">
        <div class="contact-content">
            <div class="contact-desc">
                <div class="contact-desc-item">
                    <span class="contact-desc-item-icon">
                        <i class="fi fi-rr-marker"></i>
                    </span>
                    Madagascar - Analamahitsy
                </div>
                <div class="contact-desc-item">
                    <span class="contact-desc-item-icon">
                        <i class="fi fi-rr-envelope"></i>
                    </span>
                    bareamada@gmail.com
                </div>
                <a href="" class="contact-desc-link">
                    <span class="contact-desc-link-icon">
                        <i class="fi fi-brands-facebook"></i>
                    </span>
                </a>
                <a href="" class="contact-desc-link">
                    <span class="contact-desc-link-icon">
                        <i class="fi fi-brands-instagram"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="contact-content">
            <h2 class="login-title contact-title">Contactez-nous</h2>
            <form action="{{ Route('sendmail') }}" method="post" class="form contact-form">
                @csrf
                <div class="form-content">
                    <label for="" class="form-label contact-label">Nom</label>
                    <span class="form-icon contact-icon">
                        <i class="fi fi-rr-user"></i>
                    </span>
                    <input type="text" name="name" id="" class="form-input contact-input" placeholder="Votre Nom">
                </div>
                <div class="form-content">
                    <label for="" class="form-label contact-label">Email</label>
                    <span class="form-icon contact-icon">
                        <i class="fi fi-rr-envelope"></i>
                    </span>
                    <input type="email" name="email" id="" class="form-input contact-input" placeholder="exemple@gmail.com">
                </div>
                <div class="form-content">
                    <label for="" class="form-label contact-label">Message</label>
                    <span class="form-icon contact-icon">
                        <i class="fi fi-rr-comment-text"></i>
                    </span>
                    <textarea name="message" id="" class="form-input form-textarea contact-input" placeholder="Votre message.."></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Envoyer
                    <i class="fi fi-rr-paper-plane"></i>
                </button>
            </form>
        </div>
    </section>
@endsection
