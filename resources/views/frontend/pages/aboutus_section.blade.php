{{-- //About Us --}}
<section class="promo-section bd-bottom">
    <div class="promo-wrap">
        <div class="container">
            <div class="row index-top-three">
                <div class="col-md-4 col-sm-6 xs-padding">
                    <div class="promo-content">
                        <img src="{{ asset('frontend/img/aboutus.png') }}" width="50%" alt="about icon">
                        <h3>About Us</h3>
                        <div class="promo-content-wrapper"> <!-- Changed class name -->
                            <p class="promo-content-truncate">FAYA Nepal is a non-governmental, apolitical, and not-for-profit organization based in
                                Sudurpashchim Province, Nepal. It is dedicated to empowering marginalized communities
                                through inclusive, rights-based initiatives</p>
                            <button class="promo-read-more-btn">Read Full</button> <!-- Changed class name -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 xs-padding">
                    <div class="promo-content">
                        <img src="{{ asset('frontend/img/how_we_work.png') }}" width="50%" alt="prmo icon">
                        <h3>How We work</h3>
                        <div class="promo-content-wrapper"> <!-- Changed class name -->
                            <p class="promo-content-truncate">We collaborate closely with governmental, non-governmental, private sectors, academic
                                institutions, and partner/donor agencies, all while centralizing a participatory,
                                inclusive, and human rights-based approach.</p>
                            <button class="promo-read-more-btn">Read Full</button> <!-- Changed class name -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 xs-padding">
                    <div class="promo-content">
                        <img src="{{ asset('frontend/img/mission_statement.png') }}" width="50%" alt="prmo icon">
                        <h3>Mission Statement</h3>
                        <div class="promo-content-wrapper"> <!-- Changed class name -->
                            <p class="promo-content-truncate">"Empowering communities through sustainable development and humanitarian action to build a prosperous,
                                 equitable, and resilient society." FAYA Nepal is dedicated to fostering long-term sustainable development by promoting economic productivity,
                                  social justice, environmental resilience, and inclusive governance. Simultaneously,
                                   we respond to humanitarian crises with urgency and compassion, ensuring the protection,
                                    dignity, and rights of affected communities. Through our integrated approach,
                                     we strive to create a society where every individual can thrive, today and in the future..</p>
                            <button class="promo-read-more-btn">Read Full</button> <!-- Changed class name -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .promo-content {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .promo-content-wrapper {
        flex-grow: 1;
        position: relative;
    }

    .promo-content-truncate {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: 6em;
        line-height: 1.5em;
        margin-bottom: 30px;
    }

    .promo-content-truncate.expanded {
        -webkit-line-clamp: unset;
        display: block;
    }

    .promo-read-more-btn {
        position: absolute;
        bottom: 0;
        left: 0;
        background: transparent;
        color: #007bff;
        border: none;
        cursor: pointer;
        padding: 5px 0;
        font-weight: bold;
    }

    .promo-read-more-btn:hover {
        text-decoration: underline;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Only target elements within our promo-section
        const promoSection = document.querySelector('.promo-section');
        const readMoreButtons = promoSection.querySelectorAll('.promo-read-more-btn');

        readMoreButtons.forEach(button => {
            button.addEventListener('click', function() {
                const contentWrapper = this.closest('.promo-content-wrapper');
                const content = contentWrapper.querySelector('.promo-content-truncate');
                content.classList.toggle('expanded');

                if (content.classList.contains('expanded')) {
                    this.textContent = 'Show Less';
                } else {
                    this.textContent = 'Read Full';
                }
            });
        });
    });
</script>