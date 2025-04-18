
<!-- body -->
<section class="team-section bg-grey bd-bottom circle shape padding">
    <div class="container">
        <div class="section-heading text-center mb-40">
            <h2>Meet Vollunter Team</h2>
            <span class="heading-border"></span>
            <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
        </div><!-- /Section Heading -->
        <div class="team-wrapper row">
            <div class="col-lg-6 sm-padding">
                <div class="team-wrap row">
                    @foreach ($data['teams'] as $team)


                    <div class="col-md-6">
                        <div class="team-details">
                            <img
                            src="{{ asset('upload/images/teams/'.$team->image) }}"
                            alt="{{ $team->name }}"
                            style="width: 262.2px; height: 262.2px; object-fit: cover;"
                        >
                            <div class="hover">
                                <h3>{{ $team->name }} <span>{{ $team->designation }}</span></h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 sm-padding">
                <div class="team-content histry-mission-div">
                    <h2>Become a Volunteer?</h2>
                    <h3>Join your hand with us for a better life and beautiful future.</h3>
                    <p>Together, We can build a Nation where every life is valued, and
                        every voice heard. Stand with FAYA NEPAL-because change begins with you.
                    </p>
                    <ul class="check-list">
                        <li><i class="fa fa-check"></i>We are friendly to each other.</li>
                        <li><i class="fa fa-check"></i>If you join with us,We will give you free training.</li>
                        <li><i class="fa fa-check"></i>It's an opportunity to explore yourself.</li>
                        <li><i class="fa fa-check"></i>No goal requirements.</li>
                        <li><i class="fa fa-check"></i>Joining is tottaly free. We dont need any money from you.</li>
                    </ul>
                    <a href="{{ route('become.volunteer') }}" class="default-btn">Become a Volunteer</a>
                </div>
            </div>
        </div>
    </div>
</section>
