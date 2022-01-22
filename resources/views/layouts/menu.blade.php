

<li class="nav-item">
    <a href="{{ route('v1.jurnallar.jurnalToplamlari.index') }}"
       class="nav-link {{ Request::is('v1/jurnallar/jurnalToplamlari*') ? 'active' : '' }}">
        <p>Jurnal Toplamlari</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('v1.jurnallar.jurnallar.index') }}"
       class="nav-link {{ Request::is('v1/jurnallar/jurnallar*') ? 'active' : '' }}">
        <p>Jurnallar</p>
    </a>
</li>


