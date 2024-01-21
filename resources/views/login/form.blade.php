<x-template title="Login">

    {{-- <div class="container">
        <form method="post" action="{{ route('login') }}">
            @csrf
            <x-form.group for="email" label="Email" x-show="loginMethod === True">
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ?? '' }}" required>
            </x-form.group>
            <x-form.group for="phone" label="Phone" x-show="loginMethod === 'phone'">
                <input type="phone" name="phone" id="phone" class="form-control" value="{{ old('phone') ?? '' }}" required>
            </x-form.group>
            <x-form.group for="password" label="Password" required> <input type="password" name="password" id="password" class="form-control">
            </x-form.group>
            <button type="submit" class="btn btn-success">Masuk</button>
        </form>

    </div> --}}

    <div class="wrapper">
        <div class="title-text">
            <div class="title signEmail">Sign via Email</div>
            <div class="title signPhone">Sign via Phone</div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="signEmail" checked>
                <input type="radio" name="slide" id="signPhone">
                <label for="signEmail" class="slide signEmail">Sign via Email</label>
                <label for="signPhone" class="slide signPhone">Sign via Phone</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form method="post" action="{{ route('login') }}" class="signEmail">
                    @csrf
                    <x-form.group for="email" label="Email">
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email') ?? '' }}" required>
                    </x-form.group>
                    <x-form.group for="password" label="Password" required> <input type="password" name="password"
                            id="password" class="form-control">
                    </x-form.group>
                    <button type="submit" class="btn btn-success">Masuk</button>
                </form>

                <form method="post" action="{{ route('login') }}" class="signPhone">
                    @csrf
                    <x-form.group for="phone" label="Phone">
                        <input type="phone" name="phone" id="phone" class="form-control"
                            value="{{ old('phone') ?? '' }}" required>
                    </x-form.group>
                    <x-form.group for="password" label="Password" required> <input type="password" name="password"
                            id="password" class="form-control">
                    </x-form.group>
                    <button type="submit" class="btn btn-success">Masuk</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const loginText = document.querySelector(".title-text .signEmail");
        const loginForm = document.querySelector("form.signEmail");
        const loginBtn = document.querySelector("label.signEmail");
        const signupBtn = document.querySelector("label.signPhone");
        const signupLink = document.querySelector("form .signPhone-link a");
        signupBtn.onclick = (() => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (() => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (() => {
            signupBtn.click();
            return false;
        });
    </script>
</x-template>
