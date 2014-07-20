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
    <?php foreach($restaurant as $v){?>
    <li ng-class="{'current-item':filter.rid==<?php echo $v->id?>}"><a ng-click="filter.rid=<?php echo $v->id?>"><?php echo $v->title?></a></li>
    <?php }?>
    <li ng-class="{'current-item':filter.rid==''}"><a ng-click="filter.rid=''">All</a></li>
</ul>