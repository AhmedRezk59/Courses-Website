  <div class="side-block">
      <div class="side-block">
          <!-- side block start -->
          <div class="item-title">
              <h5>الفئات</h5>
          </div>
          <ul id="category_filter" class="filtering_list">
              <li class="filter-row">
                  <label class="filtering_list d-block mb-0 font-weight-normal highlight-filter">
                      <input wire:model="categories" name="categories[]" type="checkbox" id="category_all"
                          value="all">الجميع
                  </label>
              </li>
              @foreach ($departments as $d)
                  <li class="filter-row">
                      <label class="filtering_list d-block mb-0 font-weight-normal highlight-filter">
                          <input wire:model.debounce.300ms="categories" name="categories[]" type="checkbox" id="category_all"
                              value="{{ $d->id }}">{{ $d->name }}
                      </label>
                  </li>
              @endforeach
          </ul>
      </div> <!-- side block end -->

  </div>
