<li class="nav-header">Hlavné</li>

<li class="nav-item">
	<a href="{{ route('admin.dashboard') }}" class="nav-link">
		<i class="nav-icon fas fa-tachometer-alt"></i>
		<p>Dashboard</p>
	</a>
</li>
<li class="nav-item">
	<a href="{{ route('news.index') }}" class="nav-link text-warning">
		<i class="nav-icon far fa-newspaper"></i>
		<p>Články</p>
	</a>
</li>

<li class="nav-item">
	<a href="#" class="nav-link">
		<i class="far fa-circle nav-icon"></i>
		<p>
			Nastavenia
			<i class="right fas fa-angle-left"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="{{ route('categories.index') }}" class="nav-link">
				<i class="far fa-dot-circle nav-icon"></i>
				<p>Kategórie</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('tags.index') }}" class="nav-link">
				<i class="far fa-dot-circle nav-icon"></i>
				<p>Tagy</p>
			</a>
		</li>
	</ul>
</li>

