call uglifyjs -d DEBUG=false -c -o inka3dControl.min.js inka3d/control.js
call uglifyjs -d DEBUG=false -c -o inka3dEffect.min.js inka3d/effect.js
call uglifyjs -d DEBUG=false -c -o inka3dEngine.min.js inka3d/engine.js

call uglifyjs -d DEBUG=false -c -o inka3dEffectEngine.min.js inka3d/effect.js inka3d/engine.js
call uglifyjs -d DEBUG=false -c -o inka3dControlEngine.min.js inka3d/control.js inka3d/engine.js
call uglifyjs -d DEBUG=false -c -o inka3dControlEffect.min.js inka3d/control.js inka3d/effect.js 

call uglifyjs -d DEBUG=false -c -o inka3dControlEffectEngine.min.js inka3d/control.js inka3d/effect.js inka3d/engine.js
