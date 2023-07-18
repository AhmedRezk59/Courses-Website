<div class="side-block">
    <!-- side block start -->
    <div class="item-title">
        <h5>السعر</h5>
    </div>
    <ul id="price_filter" class="filtering_list">
        <li class="filter-row">
            <label class="filtering_list d-block mb-0 font-weight-normal highlight-filter">
                <input wire:model="price" checked="checked" class="filter" data-form-id="search_form" name="price" type="radio" id="price_all_filter"
                    value="all">
                الجميع
            </label>
        </li>
        <li class="filter-row">
            <label class="filtering_list d-block mb-0 font-weight-normal">
                <input wire:model="price" class="filter" data-form-id="search_form" name="price" type="radio" id="price_free_filter"
                    value="0">مجاني
            </label>
        </li>
        <li class="filter-row">
            <label class="filtering_list d-block mb-0 font-weight-normal">
                <input wire:model="price" class="filter" data-form-id="search_form" name="price" type="radio" id="price_paid_filter"
                    value="1">مدفوع
            </label>
        </li>
    </ul>
</div>
