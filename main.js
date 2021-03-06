const electron = require('electron')

// Module to control application life.
const app = electron.app
    // Module for mennu
const Menu = electron.Menu
    // Module to create native browser window.
const BrowserWindow = electron.BrowserWindow

const path = require('path')
const url = require('url')


// PHP SERVER CREATION /////
const PHPServer = require('php-server-manager');

const server = new PHPServer({
    port: 11000,
    directives: {
        display_errors: 0,
        expose_php: 0
    }
});

//////////////////////////

// Keep a global reference of the window object, if you don't, the window will
// be closed automatically when the JavaScript object is garbage collected.
let mainWindow

function createWindow() {

    server.run();
    // Create the browser window.
    //mainWindow = new BrowserWindow({width: 800, height: 600 })

    mainWindow = new BrowserWindow({
            width: 1000,
            height: 700,
            webPreferences: {
                //preload: path.join(__dirname, 'preload.js'),
                nodeIntegration: true
            },
            frame: true,
            icon: './assets/Luffys-flag.png'
        }) //, frame: false })
    mainWindow.once('ready-to-show', () => {
            mainWindow.show()
        })
        // and load the index.html of the app.
    mainWindow.loadURL('http://' + server.host + ':' + server.port + '/')

    /*
    mainWindow.loadURL(url.format({
      pathname: path.join(__dirname, 'index.php'),
      protocol: 'file:',
      slashes: true
    }))
    */
    const { shell } = require('electron')
        //shell.showItemInFolder('fullPath')

    // Open the DevTools.
    // mainWindow.webContents.openDevTools()

    // Emitted when the window is closed.
    mainWindow.on('closed', function() {
        // Dereference the window object, usually you would store windows
        // in an array if your app supports multi windows, this is the time
        // when you should delete the corresponding element.
        // PHP SERVER QUIT
        server.close();
        mainWindow = null;
    })
}

// This method will be called when Electron has finished
// initialization and is ready to create browser windows.
// Some APIs can only be used after this event occurs.
app.on('ready', createWindow)

// Quit when all windows are closed.
app.on('window-all-closed', function() {
    // On OS X it is common for applications and their menu bar
    // to stay active until the user quits explicitly with Cmd + Q
    if (process.platform !== 'darwin') {
        // PHP SERVER QUIT
        server.close();
        app.quit();
    }
})




// In this file you can include the rest of your app's specific main process
// code. You can also put them in separate files and require them here.