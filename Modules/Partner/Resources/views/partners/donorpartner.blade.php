<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<section class="causes-section bg-grey bd-bottom padding">
    <div class="container">
        <div class="causes-wrap row">
            <div class="col-md-12">
                <div class="section-heading text-center mb-40">
                    <h2>Partners & Donors</h2>
                    <span class="heading-border"></span>
                </div><!-- /Section Heading -->
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">S.N</th>
                            <th colspan="2">Partner</th>
                            {{-- <th>Partner Logo</th> --}}
                            <th>Donors</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($partners as $index => $partner)
                            <tr>
                                <td class="text-center fw-bold">{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $partner->title }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('upload/images/partners/' . $partner->logo) }}"
                                         alt="{{ $partner->name }}"
                                         class="img-thumbnail rounded-3 border-primary"
                                         style="width: 80px; height: 80px; object-fit: contain; border-width: 2px!important;">
                                </td>
                                <td class="text-center">
                                    @foreach($partner->donors as $donor)
                                    <img src="{{ asset('upload/images/donors/' . $donor->image) }}"
                                         alt="{{ $donor->name }}"
                                         class="img-thumbnail rounded-3 border-primary"
                                         style="width: 80px; height: 80px; object-fit: contain; border-width: 2px!important;">
                                         @endforeach
                                        </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 text-muted mt-3">
                <small><i class="bi bi-info-circle me-1"></i>Last updated: {{ now()->format('M d, Y H:i') }}</small>
                <small class="float-end">Total Partners: {{ count($partners) }}</small>
            </div>
        </div>
    </div>
</section>
