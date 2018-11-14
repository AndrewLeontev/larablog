<div class="pag">
    @if ($posts->lastPage() > 1)
      <ul class="pagination  mx-auto dc_pagination dc_paginationA dc_paginationA06">
          <li class="{{ ($posts->currentPage() == 1) ? ' disabled' : '' }}">
              <a href="{{ $posts->url(1) }}">First</a>
          </li>
          @for ($i = 1; $i <= $posts->lastPage(); $i++)
              <?php
              $link_limit = 7;
              $half_total_links = floor($link_limit / 2);
              $from = $posts->currentPage() - $half_total_links;
              $to = $posts->currentPage() + $half_total_links;
              if ($posts->currentPage() < $half_total_links) {
                $to += $half_total_links - $posts->currentPage();
              }
              if ($posts->lastPage() - $posts->currentPage() < $half_total_links) {
                  $from -= $half_total_links - ($posts->lastPage() - $posts->currentPage()) - 1;
              }
              ?>
              @if ($from < $i && $i < $to)
                  <li class="{{ ($posts->currentPage() == $i) ? ' active' : '' }}">
                      <a href="{{ $posts->url($i) }}">{{ $i }}</a>
                  </li>
              @endif
          @endfor
          <li class="{{ ($posts->currentPage() == $posts->lastPage()) ? ' disabled' : '' }}">
              <a href="{{ $posts->url($posts->lastPage()) }}">Last</a>
          </li>
      </ul>
  @endif
</div>