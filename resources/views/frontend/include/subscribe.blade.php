
    <!-- Newsletter Form -->
    <form action="{{ route('subscriber.store') }}" method="post" id="mc-embedded-subscribe-form"
        name="mc-embedded-subscribe-form" class="subscribe-form validate" novalidate>
        @csrf
        <div id="mc_embed_signup_scroll">
            <label for="mce-EMAIL" class="d-none">সাবস্ক্রাইব</label>
            <input type="email" value="" name="email" class="email" id="mce-EMAIL" placeholder="আপনার ইমেইল" required>
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text"
                    name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
            <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="button">সাবস্ক্রাইব</button>
        </div>
    </form>

