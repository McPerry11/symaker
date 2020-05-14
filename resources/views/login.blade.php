<!--  . -->
@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('body')
<section class="hero is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                    <form action="" class="box">

                        <div class="field has-text-centered content">
                            <h1 class="title">SYMAKER 2.0</h1>
                        </div>

                        <div class="field">
                            <p class="control has-icons-left">
                                <input type="text" class="input" placeholder="Username">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </p>
                        </div>

                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input type="text" class="input" placeholder="Password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-key"></i>
                                </span>
                                <span class="icon is-small is-right">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </p>
                            <a href="" class="has-text-right help">Forgot Password?</a>
                        </div>

                        <div class="field has-text-centered">
                            <button class="button" type="submit" name="login">
                                LOGIN
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
 @endsection
