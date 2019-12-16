// some.module.ts
import { NgModule } from '@angular/core';

// your very important imports here

// the scanner!
import { ZXingScannerModule } from '@zxing/ngx-scanner';

// your other nice stuff

@NgModule({
  imports: [ 
    // ...
    // gets the scanner ready!
    ZXingScannerModule,
    // ...
  ]
})
export class SomeModule {}