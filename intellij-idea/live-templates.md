Live Temlates
=============

Что такое Живые Шаблоны? https://habr.com/ru/post/414813/

New React Component
-------------------

Abbreviation: cmp  
Description: New React Component  

Edit variables:
NAME `capitalize(camelCase(fileNameWithoutExtension()))`

```typescript
import React, {Component, ReactNode} from 'react';
import styles from './$NAME$.module.scss';

interface I$NAME$Props {
	$END$
}

/**
 * $NAME$.
 */
export default class $NAME$ extends Component<I$NAME$Props> {
	public render(): ReactNode {
		return (
			<div className={styles.$NAME$}>
				$NAME$
			</div>
		);
	}
}
```
