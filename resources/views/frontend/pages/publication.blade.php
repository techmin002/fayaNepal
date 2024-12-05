@extends('frontend.layouts.master')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Oswald:wght@300..700&&display=swap");

*,
*::before,
*::after {
  box-sizing: border-box;
}

:root {
  --ff-body: "Heebo", sans-serif;
  --ff-heading: "Oswald", sans-serif;

  --clr-primary-400: hsl(60 100% 50%);
  --clr-neutral-900: hsl(0 0% 0%);
  --clr-neutral-100: hsl(0 0% 100%);

  --fs-xl: clamp(3rem, 1rem + 10vw, 6rem);
  --fs-600: 2rem;
  --fs-500: 1.5rem;
  --fs-400: 1.125rem;
}

body,
h1,
h2,
h3,
p,
blockquote {
  margin: 0;
  padding: 0;
}

body {
  font-family: var(--ff-body);
  font-size: var(--fs-400);
  line-height: 1.6;
}

img {
  display: block;
  max-width: 100%;
}

h1,
blockquote {
  font-family: var(--ff-heading);
  font-weight: 900;
}

h1 {
  font-size: var(--fs-xl);
  line-height: 1;
  text-transform: uppercase;
}

blockquote {
  font-size: var(--fs-600);
  line-height: 1.2;
  text-align: center;
  margin-bottom: 1em;
}

blockquote::before {
  content: open-quote;
}

blockquote::after {
  content: close-quote;
}

article {
  display: grid;
}

article > *:not(img) {
  padding: 0 2rem;
}

.lead {
  font-size: var(--fs-500);
  max-width: 40ch;
  padding: 1rem 2rem;
}

.flow > * + * {
  margin-top: 1em;
}

.article-body {
  columns: 2 30ch;
  gap: 4rem;
  max-width: 100ch;
}

.article-body > p:first-child::first-letter {
  font-size: 4em;
  float: left;
  line-height: 1;
  margin: -5px 5px -10px -5px;
}

.article-body > p:first-child::first-line {
  font-weight: 500;
}

@media (min-width: 50em) {
  article {
    grid-template-columns: min(40%, 40rem) 1fr;
  }

  article > img {
    grid-row: 1 / 4;
    height: 100%;
    object-fit: cover;
  }

  article > *:not(img) {
    grid-column: 2 / -1;
  }
}

</style>
@section('content')
        <div class="pager-header">
            <div class="container">
                <div class="page-content">
                    <h2>partners</h2>
                    <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Publication</li>
                    </ol>
                </div>
            </div>
        </div><!-- /Page Header -->
        <!-- body -->
      
        <main>
      <article>
        <div class='row'>
      <div class='col-3'>
        <img
          src="https://images.unsplash.com/photo-1611824204322-24963b44d68b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=650&q=80"
          alt="woman wearing sunglasses"
          class="article-main-image"
        />
     </div>
     <div class='col-9'>
        <h1>Dagny Taggart</h1>
        <p class="lead">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae,
          veniam.
        </p>
        <div class="article-body flow">
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae
            modi ab recusandae aliquid perspiciatis unde dolorum id natus velit
            vel, facere excepturi similique nemo enim quasi nam, expedita
            inventore? Repellat aspernatur ducimus facilis nemo omnis sunt unde,
            vel doloribus error enim id deleniti saepe placeat.
          </p>
          <p>
            Voluptatem ipsum tempora vel quisquam cumque natus nesciunt vitae
            ipsam in inventore, earum eligendi impedit. Sunt quis veniam numquam
            vitae, magnam, debitis reiciendis in voluptas porro voluptatum, est
            consequuntur illo! Assumenda saepe aliquid eos fugiat rerum
            similique sequi illo velit amet officia voluptas, sed ducimus.
          </p>
          <p>
            Quasi necessitatibus mollitia quisquam officiis molestiae fugiat
            officia cumque tempora accusamus adipisci quia, suscipit earum rerum
            illo, fugit architecto fuga eius error labore! Ducimus voluptate
            quae aliquid obcaecati beatae exercitationem quaerat molestiae quos,
            atque dolorum id quo sint vero sit reiciendis cumque consectetur
            molestias temporibus.
          </p>
          <blockquote>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis,
            blanditiis.
          </blockquote>
          <p>
            Molestiae magnam similique dolorum vero libero doloribus neque,
            voluptas natus sunt facere ipsa cupiditate placeat necessitatibus
            cum perferendis ducimus deserunt architecto nesciunt, illum ab
            aliquid minus dignissimos dolore voluptatibus? Perferendis,
            incidunt! Repellendus numquam nobis quidem totam dolor aliquid.
            Placeat rerum eveniet doloribus asperiores quis iusto!
          </p>
        </div>
        </div>
        </div>
      </article>
    </main>
       
           
        @endsection