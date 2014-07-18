<ul class="pull-left">
    <li>
        <a data-toggle="modal" data-target="#myModal">
            <span class="icon-shopping-cart"></span>
            <b>{{cart.getTotalCount()}}</b> items <b>{{cart.getTotalPrice() | currency}}</b>
        </a>
    </li>
</ul>


<ul>
    <li><input ng-model="filter.title" class="form-control" placeholder="Search"></li> 
    <li><a ng-click="filter.rid=1">一品佳</a></li>
    <li><a ng-click="filter.rid=2">翠竹园</a></li>
</ul>