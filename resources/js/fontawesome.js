
// import { fontawesome } from '@fortawesome/fontawesome-free';

import { library, dom } from '@fortawesome/fontawesome-svg-core';

import { faCaretUp } from '@fortawesome/free-solid-svg-icons/faCaretUp';
import { faCaretDown } from '@fortawesome/free-solid-svg-icons/faCaretDown';
import { faStar } from '@fortawesome/free-solid-svg-icons/faStar';
import { faCheck } from '@fortawesome/free-solid-svg-icons/faCheck';

// fontawesome.library.add([faCaretUp, faCaretDown, faCheck, faStar]); 
library.add(faCaretUp, faCaretDown, faCheck, faStar);

// As we are using the Svg core we replace <i> tag with <svg>
// https://fontawesome.com/v5.15/how-to-use/on-the-web/advanced/svg-javascript-core
dom.watch()