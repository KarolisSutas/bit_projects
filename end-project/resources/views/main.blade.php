@extends('layouts.app')


@section('content')

<div class="container my-5">
  <div class="row">
    <!-- Kairė pusė: istorijų kortelės -->
    <div class="col-md-8">
      <div class="card shadow-sm mb-4" style="max-width: 600px;">
        <img src="" class="card-img-top" alt="Story image">
        <div class="card-body">
          <h5 class="card-title mb-1">Jonas Jonaitis</h5>
          <p class="text-muted">Fundraising cause: <strong>Nauja knygų biblioteka</strong></p>
          <p class="mb-1">Neccessary amount: <strong>€1000</strong></p>
          <p class="mb-2">Missing funds: <strong>€250</strong></p>

          <div class="progress mb-3" style="height: 25px;">
            <div class="progress-bar bg-orange fw-bold text-dark" role="progressbar" style="width: 75%;" 
                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              funded €750 (75%)
            </div>
          </div>

          <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-teal bg-gradient text-white bg-opacity-75">
              <i class="bi bi-heart-fill me-1"></i> Donate
            </a>
            <a href="#" class="btn btn-outline-teal">
              <i class="bi bi-book me-1"></i> View full story
            </a>
          </div>
        </div>
      </div>

      {{-- čia vėliau bus daugiau istorijų kortelių --}}
    </div>

    <!-- Dešinė pusė: statistika (sticky) -->
    <div class="col-md-4">
      <div class="position-sticky" style="top: 100px;"> 
        <div class="card shadow-sm p-4 text-center">
            <h3 class="fw-bold mt-2">124</h3>
            <p class="text-muted">Total Stories</p>
          <hr>
            <h3 class="fw-bold mt-2">€50,000</h3>
            <p class="text-muted">Donations Made</p>
          <hr>
            <h3 class="fw-bold mt-2">320</h3>
            <p class="text-muted">Active Users</p>
        </div>
      </div>
    </div>
  </div>

    {{-- akordeonas --}}
  <div class="accordion mt-5" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            About project
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <ul class="list-unstyled">
              <li class="mb-2"><strong class="text-pink">What is HopeFund?</strong><br> HopeFund is an online platform where people can share their personal stories and raise funds for important causes. Whether it’s medical expenses, education, or community projects, HopeFund helps connect those in need with people willing to support them.</li>
              <li class="mb-2"><strong class="text-pink">Who can use HopeFund?</strong><br> Anyone can browse and donate to stories. To create your own story, you need to register for a free account. Once registered, you can start sharing your story and collecting donations.</li>
              <li class="mb-2"><strong class="text-pink">Is HopeFund free to use?</strong><br> Yes, creating a story on HopeFund is completely free. All funds raised go directly to the campaign creator, minus standard payment processing fees charged by third-party providers (e.g., PayPal or Stripe).</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Creating a Story
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <ul class="list-unstyled">
              <li class="mb-2"><strong class="text-pink">How do I create a story?</strong><br> After logging into your account, simply click on <u>“Create Story”</u> in the navigation bar. Fill in the required information such as the title, description, fundraising goal, and upload an image to make your story more engaging.</li>
              <li class="mb-2"><strong class="text-pink">What details should I include in my story?</strong><br> A clear and detailed description will help people understand your cause. Include:
                <ul>
                  <li>A meaningful title</li>
                  <li>A description of your situation or project</li>
                  <li>The fundraising goal amount</li>
                  <li>At least one photo that represents your story</li>
                </ul>
              </li>
              <li class="mb-2"><strong class="text-pink">Can I edit or delete my story later?</strong><br> Yes, you can manage your stories at any time. Log into your account, go to <u>“My Stories”</u>, and you’ll be able to edit or delete any story you have created.</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Donations & Support
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <ul class="list-unstyled">
              <li class="mb-2"><strong class="text-pink">How can I donate?</strong><br> Choose a story you want to support and click on the “Donate” button. You will be guided through a secure payment process to complete your donation.</li>
              <li class="mb-2"><strong class="text-pink">Is my donation secure?</strong><br> Absolutely. All transactions are processed through trusted and secure payment providers like PayPal or Stripe. HopeFund never stores your payment information.</li>
              <li class="mb-2"><strong class="text-pink">Can I donate anonymously?</strong><br> Yes, when donating you can choose to hide your name and donation amount. The story creator will see your support, but your details will not be shown publicly.</li>
            </ul>
            </ul>
          </div>
        </div>
      </div>
  </div>
</div>  

  

@endsection