const txtAnim = document.querySelector('#bonjour');

new Typewriter (txtAnim, {
    loop: true
})
.changeDelay(500)

.typeString('<span style="color:blue">Bon</span><span style="color:white;text-shadow:1px 1px 2px white, 0 0 1em white, 0 0 0.2em black">jo</span><span style="color:red">ur,</span>')
.pauseFor(100)
.deleteChars(8)

.typeString('<span style="color:white;text-shadow:1px 1px 2px white, 0 0 0.2em black">He</span><span style="color:red">y,</span>')
.pauseFor(100)
.deleteChars(4)

.typeString('<span style="color:black">Gut</span><span style="color:red">en <span><span style="color:yellow">Tag,</span>')
.pauseFor(100)
.deleteChars(11)

.typeString('<span style="color:red">Nĭ Hăo,</span>')
.pauseFor(100)

.start()
