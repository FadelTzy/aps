@extends('base')

@section('css')
@endsection


@section('content')
    <!--=================================
                                                                    Inner Header -->
    <div class="inner-header bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6 text-center text-sm-start mb-2 mb-sm-0">
                    <h1 class="breadcrumb-title mb-0">FREQUENTLY ASKED QUESTIONS (FAQ)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb d-flex justify-content-center justify-content-sm-end ms-auto">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Beranda</a>
                        </li>
                        <li class="breadcrumb-item active"><span>FAQ</span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--=================================
                                                                    Inner Header -->

    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion accordion-style-2" id="accordion-item-2">
                        <div class="card">
                            <div class="accordion-icon card-header" id="one-accordion-item-2">
                                <h6 class="mb-0">
                                    <button class="btn" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-one-accordion-item-2" aria-expanded="true"
                                        aria-controls="collapse-one-accordion-item-2">
                                        1. Do you guarantee any rate of return for my investments?
                                    </button>
                                </h6>
                            </div>
                            <div id="collapse-one-accordion-item-2" class="collapse show"
                                aria-labelledby="one-accordion-item-2" data-bs-parent="#accordion-item-2">
                                <div class="card-body">
                                    Under each virtue, he wrote a summary that gave it fuller meaning. Then he practiced
                                    each one for a certain length of time. To make these virtues a habit, Franklin can up
                                    with.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="accordion-icon card-header" id="two-accordion-item-2">
                                <h6 class="mb-0">
                                    <button class="btn collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-two-accordion-item-2" aria-expanded="false"
                                        aria-controls="collapse-two-accordion-item-2">
                                        2. Why is it essential that Finaxo holds itself out as a fiduciary?
                                    </button>
                                </h6>
                            </div>
                            <div id="collapse-two-accordion-item-2" class="collapse"
                                aria-labelledby="two-accordion-item-2" data-bs-parent="#accordion-item-2">
                                <div class="card-body">
                                    Benjamin Franklin, inventor, statesman, writer, publisher and economist relates in his
                                    autobiography that early in his life he decided to focus on arriving at moral
                                    perfection. He made a list of 13 virtues, assigning a page to each.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="accordion-icon card-header" id="three-accordion-item-2">
                                <h6 class="mb-0">
                                    <button class="btn collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-three-accordion-item-2" aria-expanded="false"
                                        aria-controls="collapse-three-accordion-item-2">
                                        3. How do I get started working with Finaxo?
                                    </button>
                                </h6>
                            </div>
                            <div id="collapse-three-accordion-item-2" class="collapse"
                                aria-labelledby="three-accordion-item-2" data-bs-parent="#accordion-item-2">
                                <div class="card-body">
                                    So, there you have it; the six steps that will help you to the fabled land of
                                    achievement and success! You now have the opportunity to push ahead and reach your
                                    potential. No more excuses – make the commitment to take action TODAY!
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="accordion-icon card-header" id="for-accordion-item-2">
                                <h6 class="mb-0">
                                    <button class="btn collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-for-accordion-item-2" aria-expanded="false"
                                        aria-controls="collapse-for-accordion-item-2">
                                        4. Who has the supervision of my funds when I hire you to manage it?
                                    </button>
                                </h6>
                            </div>
                            <div id="collapse-for-accordion-item-2" class="collapse"
                                aria-labelledby="for-accordion-item-2" data-bs-parent="#accordion-item-2">
                                <div class="card-body">
                                    Commitment is something that comes from understanding that everything has its price and
                                    then having the willingness to pay that price. This is important because nobody wants to
                                    put significant effort into something, only to find out after the fact that the price
                                    was too high.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="accordion-icon card-header" id="five-accordion-item-2">
                                <h6 class="mb-0">
                                    <button class="btn collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-five-accordion-item-2" aria-expanded="false"
                                        aria-controls="collapse-five-accordion-item-2">
                                        5. What can Finaxo really do for me?
                                    </button>
                                </h6>
                            </div>
                            <div id="collapse-five-accordion-item-2" class="collapse"
                                aria-labelledby="five-accordion-item-2" data-bs-parent="#accordion-item-2">
                                <div class="card-body">
                                    The price is something not necessarily defined as financial. It could be time, effort,
                                    sacrifice, money or perhaps, something else. The point is that we must be fully aware of
                                    the price and be willing to pay it, if we want to have success.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="accordion-icon card-header" id="six-accordion-item-2">
                                <h6 class="mb-0">
                                    <button class="btn collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-six-accordion-item-2" aria-expanded="false"
                                        aria-controls="collapse-six-accordion-item-2">
                                        6. Am I qualified to become a client of Finaxo?
                                    </button>
                                </h6>
                            </div>
                            <div id="collapse-six-accordion-item-2" class="collapse"
                                aria-labelledby="six-accordion-item-2" data-bs-parent="#accordion-item-2">
                                <div class="card-body">
                                    It is truly amazing the damage that we, as parents, can inflict on our children. So why
                                    do we do it? For the most part, we don’t do it intentionally or with malice. In the
                                    majority of cases, the cause is a well-meaning but unskilled.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="accordion-icon card-header" id="seven-accordion-item-2">
                                <h6 class="mb-0">
                                    <button class="btn collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-seven-accordion-item-2" aria-expanded="false"
                                        aria-controls="collapse-seven-accordion-item-2">
                                        7. What should I expect in the financial planning process?
                                    </button>
                                </h6>
                            </div>
                            <div id="collapse-seven-accordion-item-2" class="collapse"
                                aria-labelledby="seven-accordion-item-2" data-bs-parent="#accordion-item-2">
                                <div class="card-body">
                                    “Nothing changes until something moves” – this is the battle cry of author and
                                    journalist Robert Ringer. And he is absolutely correct. Not all of the decision-making,
                                    clarity, planning, focus and belief in the world
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('js')
@endpush
