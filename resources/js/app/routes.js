import auth from './auth/routes'
import home from './home/routes'
import welcome from './welcome/routes'
import errors from './errors/routes'

export default [...auth, ...home, ...errors, ...welcome]