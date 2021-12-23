<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This footer snippet is reused in all templates.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
  </main>

  <footer class="footer">
      <div class="container">
          <footer class="py-3 my-4">
              <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                  <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                  <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                  <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                  <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                  <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
              </ul>
              <p class="text-center text-muted">© 2021 Company, Inc</p>
          </footer>
      </div>
  </footer>

  <?= js([
    'assets/js/prism.js',
    'assets/js/lightbox.js',
    'assets/js/index.js',
    '@auto'
  ]) ?>

</body>
</html>
