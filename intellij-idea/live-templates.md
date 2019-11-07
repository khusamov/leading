Live Temlates
=============

New React Component
-------------------

Abbreviation: cmp  
Description: New React Component  

Edit variables:
1 capitalize(camelCase(fileNameWithoutExtension()))

```typescript
import React, {Component, ReactNode} from 'react';
import styles from './$1$.module.scss';

interface I$1$Props {
	$END$
}

/**
 * $1$.
 */
export default class $1$ extends Component<I$1$Props> {
	public render(): ReactNode {
		return (
			<div className={styles.$1$}>
				$1$
			</div>
		);
	}
}
```
