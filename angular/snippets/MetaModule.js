

app.module.ts
-------------

```javascript
import { MetaModule, MetaConfig } from 'ng2-meta';

const metaConfig: MetaConfig = {
	useTitleSuffix: true,
	defaults: {
		title: 'Юлия Туржова',
		titleSuffix: ' — Юлия Туржова'
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
			title: "Юлия Туржова",
			titleSuffix: ''
		}
	},
	component: HomePageComponent,
	children: []
}, {
```
