

app.module.ts
-------------

```javascript
import { MetaModule, MetaConfig } from 'ng2-meta';

const metaConfig: MetaConfig = {
	useTitleSuffix: true,
	defaults: {
		title: 'Название сайта',
		titleSuffix: ' — Название сайта'
	}
};

@NgModule({
	imports: [
		MetaModule.forRoot(metaConfig)
	]
})
export class AppModule { }
```

app-routing.module.ts
---------------------

```javascript
const routes: Routes = [{
	path: '',
	data: {
		meta: {
			title: "Название страницы",
			titleSuffix: ''
		}
	},
	component: HomePageComponent,
	children: []
}, {
```
