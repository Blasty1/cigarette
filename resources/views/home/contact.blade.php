@extends('../layouts.layout_pre')

@section('content')
<main>
    <section>
        <div class="presentation">
            <div class="intro-text">
                <form action="#" method="post">
                    <h1>Curiosità o dubbi? <br>Porgili qui e le risponderemo al più presto</h1>


                    <div class="form-contact">
                        <div class="contact-input">

                            <label for="name">Nome</label>
                            <input type="text" name="name">

                            <label for="email">Email</label>
                            <input type="email" name="email">


                        </div>
                        <div class="message">
                            <label for="body">Scrivi qui
                                <textarea id="body"> test</textarea></label>
                        </div>
                    </div>

                    <input type="submit" value="invia" class="contact-submit">
                </form>

            </input>
        </div>
    </section>
</main>


@endsection